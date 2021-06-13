<?php

namespace App\Http\Controllers;

use App\Helpers\BulkSmsNigeria;
use App\Models\Identification;
use App\Models\Offer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
	private $status = 300;

	/**
	 * Returns a view
	 */
	public function profile()
	{
		$offers = Offer::all()->where('user_id', Auth::id());
		return view('profile.profile', ['user' => Auth::user(), 'offers' => $offers]);
	}

	/**
	 * Returns a view
	 */
	public function profileVerify()
	{
		return view('profile.verify.verification', ['user' => Auth::user()]);
	}

	/**
	 * Returns a view
	 */
	public function verifyPhone()
	{
		if (Auth::user()->hasVerifiedPhone())
			return redirect(route('profile.verify.index'));
		return view('profile.verify.phone');
	}

	/**
	 * Returns a view
	 */
	public function verifyBank()
	{
		if (Auth::user()->hasVerifiedBank())
			return redirect(route('profile.verify.index'));
		return view('profile.verify.bank');
	}

	/**
	 * Returns a view
	 */
	public function verifyId()
	{
		if (Auth::user()->hasVerifiedId())
			return redirect(route('profile.verify.index'));
		return view('profile.verify.id', ['user' => Auth::user()]);
	}

	/**
	 * Function to send OTP.
	 *
	 * @param Request $request
	 * @return Application|ResponseFactory|Response
	 */
	public function sendOtp(Request $request)
	{
		$response = [];
		$user = auth()->user();
		$otp = rand(100000, 999999);
		// dd($request->phone);

		//Removing Session variable
		/*$request->session()->forget(['OTP', 'phone']);*/

		$request->session()->put([
			'OTP' => $otp,
			'phone' => str_replace(' ', '', $request->phone),
		]);

		$request->validate([
			'phone' => ['required', 'string', 'min:11', 'max:16'],
		]);

		$phone = str_replace(' ', '', $request->phone);

		$bulkSmsResponse = BulkSmsNigeria::sendSms($otp, str_replace(['+234 '], '0', $phone));

		if ($bulkSmsResponse->error) {
			$response['error'] = true;
			$response['message']['phone'] = 'Sending sms failed. Contact admin.';
		} else {
			$request->session()->put([
				'OTP' => $otp,
				'phone' => $phone,
			]);

			$response['error'] = false;
			$response['OTP'] = $otp;
			$response['session'] = $request->session()->all();
			$response['message']['phone'] = 'Your OTP is created.';
			$this->status = 200;
		}
		return response($response, $this->status);
		// return redirect('profile/verify/phone')->with('message', 'OTP has been sent');
	}

	/**
	 * Function to verify OTP.
	 *
	 * @param Request $request
	 * @return Application|ResponseFactory|Response
	 */
	public function verifyOtp(Request $request)
	{
		$response = [];

		// dd($request->session()->get('phone'));
		$request->validate([
			'otp' => ['required', 'digits:6'],
		]);

		$enteredOtp = $request->otp;
		$user = auth()->user();

		$OTP = $request->session()->get('OTP');

		if ($OTP == $enteredOtp) {
			// Updating user's status "isVerified" as 1.
			$phone = $request->session()->get('phone');

			$user->update([
				'phone' => $phone,
				'is_phone_verified' => true
			]);

			//Removing Session variable
			$request->session()->forget(['OTP', 'phone']);

			/*$response['error'] = false;
			$response['isPhoneVerified'] = true;*/
			$response['message']['otp'] = "Your Phone Number is Verified. Please wait...";
			$this->status = 200;
		} else {
			//Removing Session variable
			$request->session()->forget(['OTP']);

			/*$response['error'] = true;
			$response['isPhoneVerified'] = false;*/
			$response['message']['otp'] = "Invalid OTP. Please resend OTP";
		}
		return response($response, $this->status);
		/*return redirect('profile/verify');*/
	}

	public function resendOtp(Request $request)
	{
		$response = [];
		$phone = $request->session()->get('phone');

		if ($phone) {
			$otp = $request->session()->get('OTP');
			$phone = str_replace(' ', '', $phone);
			$bulkSmsResponse = BulkSmsNigeria::sendSms($otp, $phone);

			if ($bulkSmsResponse->error) {
				$response['error'] = true;
				$response['message']['phone'] = 'Sending sms failed. Contact admin.';
			} else {
				$request->session()->put([
					'OTP' => $otp,
					'phone' => $phone,
				]);

				$response['error'] = false;
				$response['OTP'] = $otp;
				$response['session'] = $request->session()->all();
				$response['message']['phone'] = 'Your OTP is created.';
				$this->status = 200;
			}
		} else {
			$response['error'] = true;
			$response['message']['phone'] = 'phone number not available.';
		}
		return response($response, $this->status);
	}

	/**
	 * @param Request $request
	 * @return mixed
	 * @throws ValidationException
	 */
	public function updateBank(Request $request)
	{
		// dd($request);
		Validator::make($request->all(), [
			'bank_name' => ['bail', 'required', 'string'],
			'account_name' => ['bail', 'required', 'string'],
			'account_number' => ['bail', 'required', 'string', 'digits:10'],
			'account_type' => ['bail', 'required', 'string'],
			'bank_code' => ['bail', 'required', 'string'],
		])->validate();
		/*$request->validate([

		]);*/

		$user = auth()->user();

		return $user->bankDetail->update([
			'bank_name' => $request->bank_name,
			'account_name' => $request->account_name,
			'account_number' => $request->account_number,
			'account_type' => $request->account_type,
			'bank_code' => $request->bank_code,
			'is_verified' => true,
		]);
	}

	/**
	 * @param Request $request
	 * @return Application|ResponseFactory|Response
	 * @throws ValidationException
	 */
	public function uploadId(Request $request)
	{
		Validator::make($request->all(), [
			'id_type' => ['bail', 'string', 'required'],
			'id_number' => ['bail', 'string', 'required'],
			'dob' => ['bail', 'date', 'required'],
			'id_upload_front' => ['bail', 'image', 'required', 'max:20480'],
			'id_upload_back' => ['bail', Rule::requiredIf($request['front_only'] === 'false'), 'max:20480'],
		])->validate();

		$id_back = !empty($request['id_upload_back']) ? $request->file('id_upload_back') : NULL;
		$id_front = $request->file('id_upload_front');

		$upload_settings = $this->uploadSettings('ID');
		$db_destination = $upload_settings['db_path'];
		$destination = $upload_settings['path'];

		$id_back_output = !empty($id_back) ? 'id_back_' . Auth::id() . '.' . $id_back->getClientOriginalExtension() : NULL;
		$id_front_output = 'id_front_' . Auth::id() . '.' . $id_front->getClientOriginalExtension();

		if ($request['front_only'] === 'false')
			if (in_array($id_back->getClientOriginalExtension(), $upload_settings['accepted_ext']) && in_array($id_front->getClientOriginalExtension(), $upload_settings['accepted_ext'])) {
				Storage::deleteDirectory($destination);
				if (Storage::makeDirectory($destination))
					if ($id_front->storeAs($destination, $id_front_output) && $id_back->storeAs($destination, $id_back_output)) {
						Identification::where('user_id', Auth::id())->update([
							'dob' => date('Y-m-d', date_timestamp_get(date_create($request['dob']))),
							'id_number' => $request['id_number'],
							'id_type' => $request['id_type'],
							'id_front' => $db_destination . $id_front_output,
							'id_back' => $db_destination . $id_back_output,
						]);
						$message = 'Upload Successful. Verification process will take 24hrs.';
						$this->status = 200;
					} else {
						Storage::deleteDirectory($destination);
						$message = 'Error Uploading your ID please try again. Please contact us if this continues';
					}
				else
					$message = 'An error occurred: Could not access storage. Please contact us if this continues';
			} else
				$message = 'ID upload must be a JPG or PNG image';
		else {
			if (in_array($id_front->getClientOriginalExtension(), $upload_settings['accepted_ext'])) {
				Storage::deleteDirectory($destination);
				if (Storage::makeDirectory($destination))
					if ($id_front->storeAs($destination, $id_front_output)) {
						Identification::where('user_id', Auth::id())->update([
							'dob' => date('Y-m-d', date_timestamp_get(date_create($request['dob']))),
							'id_number' => $request['id_number'],
							'id_type' => $request['id_type'],
							'id_front' => $db_destination . $id_front_output,
							'id_back' => NULL,
						]);
						$message = 'Upload Successful. Verification process will take 24hrs.';
						$this->status = 200;
					} else {
						Storage::deleteDirectory($destination);
						$message = 'Error Uploading your ID please try again. Please contact us if this continues';
					}
				else
					$message = 'An error occurred: Could not access storage. Please contact us if this continues';
			} else
				$message = 'ID upload must be a JPG or PNG image';
		}

		return Response(['message' => $message], $this->status);
	}

	/**
	 * @param $dir
	 * @return array
	 */
	private function uploadSettings($dir)
	{
		return [
			'rand' => substr(str_shuffle('1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10),
			'db_path' => '/storage/user_data/uploads/' . Auth::id() . '/' . $dir . '/',
			'path' => '/public/user_data/uploads/' . Auth::id() . '/' . $dir . '/',
			'accepted_ext' => ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG']
		];
	}
}
