<?php

namespace App\Http\Controllers;

use App\Helpers\BulkSmsNigeria;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Returns a view
     */
    public function profile()
    {
        return view('profile.profile', ['user' => Auth::user()]);
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
    public function veriifyPhone()
    {
        return view('profile.verify.phone');
    }
    /**
     * Returns a view
     */
    public function verifyBank()
    {
        return view('profile.verify.bank');
    }
    /**
     * Returns a view
     */
    public function verifyId()
    {
        return view('profile.verify.id');
    }

    /**
     * Function to send OTP.
     *
     * @return Response
     */
    public function sendOtp(Request $request)
    {
        // dd($request->phone);

        //Removing Session variable
        $request->session()->forget(['OTP', 'phone']);

        $response = array();
        $user = auth()->user();

        $request->validate([
            'phone' => ['required', 'string', 'min:11', 'max:14'],
        ]);

        $otp = rand(100000, 999999);
        // dd($otp);

        $bulkSms = new BulkSmsNigeria();

        $bulkSmsResponse = $bulkSms->sendSms($otp, $request->phone);

        // dd($bulkSmsResponse);

        if ($bulkSmsResponse['error']) {
            $response['error'] = true;
            $response['message'] = $bulkSmsResponse['message'];
        } else {

            $request->session()->put([
                'OTP' => $otp,
                'phone' => $request->phone,
            ]);

            $response['error'] = false;
            $response['message'] = 'Your OTP is created.';
            $response['OTP'] = $otp;
        }

        // return json_encode($response);
        // echo json_encode($response);
        return redirect('profile/verify/phone')->with('message', 'OTP has been sent');
    }

    /**
     * Function to verify OTP.
     *
     * @return Response
     */
    public function verifyOtp(Request $request)
    {
        // dd($request->session()->get('phone'));
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $response = array();

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

            $response['error'] = false;
            $response['isPhoneVerified'] = true;
            $response['message'] = "Your Phone Number is Verified.";
        } else {
            //Removing Session variable
            $request->session()->forget(['OTP', 'phone']);

            $response['error'] = true;
            $response['isPhoneVerified'] = false;
            $response['message'] = "Invalid OTP";
        }

        // return json_encode($response);
        return redirect('profile/verify');
    }

    public function updateBank(Request $request)
    {
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

    public function uploadId(Request $request)
    {
        dd($request);
    }
}
