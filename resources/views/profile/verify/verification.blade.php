@extends('layouts.dashboard')
@section('content')
    <div class="card card-bodered">
        <div class="nk-kycfm">
            <div class="nk-kycfm-head">
                {{-- visible on only xs --}}
                <a>
                    <div class=""><img class="w-70 d-block d-sm-none" src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedEmail() ? 'success' : 'pending'}}.png" alt="" srcset=""></div>
                    {{-- Hidden on only sm --}}
                    <div class=""><img class="w-40 d-none d-sm-block" src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedEmail() ? 'success' : 'pending'}}.png" alt="" srcset=""></div>
                </a>
                <div class="nk-kycfm-title">
                    <h5 class="title">Email Address Verification</h5>
                    <p class="sub-title">
                        {{ $user->hasVerifiedEmail() ? 'Your Email Address has been successfully verified ' : 'Verify your Email Address' }}
                    </p>
                </div>
            </div><!-- .nk-kycfm-head -->

            <div class="nk-kycfm-head">
                <a {!! !$user->hasVerifiedPhone() ? 'href="' . route('profile.verify.phone') . '"' : NULL !!}>
                    <div class=""><img class="w-70 d-block d-sm-none" src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedPhone() ? 'success' : 'pending'}}.png" alt="" srcset=""></div>
                    {{-- Hidden on only sm --}}
                    <div class=""><img class="w-40 	 d-none d-sm-block" src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedPhone() ? 'success' : 'pending'}}.png" alt="" srcset=""></div>
                </a>
                <div class="nk-kycfm-title">
                    <h5 class="title">Phone Number Verification</h5>
                    <p class="sub-title">
                        {{ $user->hasVerifiedPhone() ? 'Your phone number has been successfully verified ' : 'Your phone number still requires verification for your identification' }}
                    </p>
                </div>
            </div><!-- .nk-kycfm-head -->

            <div class="nk-kycfm-head">
                <a href="{{URL("profile/verify/bank")}}">
                    <div class=""><img class="w-70 d-block d-sm-none"
                                       src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedBank() ? 'success' : 'pending'}}.png"
                                       alt="" srcset=""></div>
                    {{-- Hidden on only sm --}}
                    <div class=""><img class="w-40 	 d-none d-sm-block"
                                       src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedBank() ? 'success' : 'pending'}}.png"
                                       alt="" srcset=""></div>
                </a>
                <div class="nk-kycfm-title">
                    <h5 class="title">Bank Verification</h5>
                    <p class="sub-title">To verify your identity, please upload any of your document.</p>
                </div>
            </div><!-- .nk-kycfm-head -->

            <div class="nk-kycfm-head">
                <a href="{{URL("profile/verify/id")}}">
                    <div class=""><img class="w-70 d-block d-sm-none"
                                       src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedId() ? 'success' : 'pending'}}.png"
                                       alt="" srcset=""></div>
                    {{-- Hidden on only sm --}}
                    <div class=""><img class="w-40 	 d-none d-sm-block"
                                       src="../../../dashboard/images/email/kyc-{{$user->hasVerifiedId() ? 'success' : 'pending'}}.png"
                                       alt="" srcset=""></div>
                </a>
                <div class="nk-kycfm-title">
                    <h5 class="title">ID Verification</h5>
                    <p class="sub-title">To verify your identity, please upload any of your document.</p>
                </div>
            </div><!-- .nk-kycfm-head -->

        </div><!-- .card -->
    </div><!-- .card -->
@endsection
