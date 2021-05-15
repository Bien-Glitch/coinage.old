<?php

namespace App\Http\Controllers;

use App\Helpers\BulkSmsNigeria;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
	private int $status = 300;

	/**
	 * Returns a view
	 */
	public function profile() {
		return view('profile.profile', ['user' => Auth::user()]);
	}

	/**
	 * Returns a view
	 */
	public function profileVerify() {
		return view('profile.verify.verification', ['user' => Auth::user()]);
	}

	/**
	 * Returns a view
	 */
	public function verifyPhone() {
		return view('profile.verify.phone');
	}

	/**
	 * Returns a view
	 */
	public function verifyBank() {
		return view('profile.verify.bank');
	}

	/**
	 * Returns a view
	 */
	public function verifyId() {
		return view('profile.verify.id');
	}

	/**
	 * Function to send OTP.
	 *
	 * @param Request $request
	 * @return Application|ResponseFactory|Response
	 */
	public function sendOtp(Request $request) {
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
	public function verifyOtp(Request $request) {
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

	public function resendOtp(Request $request) {
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

	public function updateBank(Request $request) {
		// dd($request);
		$request->validate([
			'bank_name' => ['required', 'string'],
			'account_name' => ['required', 'string'],
			'account_number' => ['required', 'string', 'digits:10'],
			'account_type' => ['required', 'string'],
			'bank_code' => ['required', 'string'],
		]);

		$user = auth()->user();

		$user->bankDetail->update([
			'bank_name' => $request->bank_name,
			'account_name' => $request->account_name,
			'account_number' => $request->account_number,
			'account_type' => $request->account_type,
			'bank_code' => $request->bank_code,
			'is_verified' => true,
		]);

		return redirect('profile/verify');
	}

	public function uploadId(Request $request) {
		dd($request);
	}
}
