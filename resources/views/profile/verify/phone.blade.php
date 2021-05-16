@extends('layouts.dashboard')
@section('content')
    <div class="card card-bordered">
        <div class="nk-kycfm">
            <div class="nk-kycfm-head">
                <div class="nk-kycfm-title">
                    <h5 class="title">Phone Number Verification</h5>
                    <p class="sub-title">Your verification code will be sent to your phone number</p>
                </div>
            </div><!-- .nk-kycfm-head -->
            <div class="nk-kycfm-content">
                <div class="nk-kycfm-note">
                    <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em>
                    <p>Please make sure the provided phone number belongs to you. Click Send to recieve OTP</p>
                </div>
                <div class="">
                    @csrf
                    <div class="col-md-8">
                        <form action="{{ route('phone.otp.send') }}" class="phone-otp-form" method="POST" id="send-phone-otp-form">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Phone Number<span class="text-danger">*</span></label>
                                </div>
                                {{--@if (session('message'))
                                    <span class="form-note text-success font-weight-bold">{{session('message')}}</span>
                                @endif--}}

                                <small id="wait-text" style="display: none">Wait <span id="count"></span>s before resending</small>
                                <div class="input-group mb-3">
                                    <input type="tel" class="form-control bfh-phone" name="phone" id="phone" data-country="NG" value="{{ old('phone') }}" required placeholder="Phone">

                                    <div class="input-group-append align-items-center">
                                        <button class="btn btn-outline-primary" type="submit">Send</button>
                                        <button class="btn btn-outline-primary resend" type="button" data-uri="{{ route('phone.otp.resend') }}" style="display: none">Resend</button>
                                    </div>

                                    <span id="phoneValid" role="alert">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div><!-- .col -->
                    <div id="verify-otp-wrapper" class="col-md-8" style="display: none">
                        <form action="{{ route('phone.otp.verify') }}" method="POST" id="verify-phone-otp-form">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Verification Code <span class="text-danger">*</span></label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="otp" id="otp" value="{{ old('otp') }}" required placeholder="OTP">

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Verify</button>
                                    </div>

                                    <span id="otpValid" role="alert">
                                        <strong></strong>
                                    </span>

                                    {{--@error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror--}}
                                </div>
                            </div>
                        </form>
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .nk-kycfm-content -->

        </div><!-- .nk-kycfm -->
    </div><!-- .card -->
    <script src="{{ asset('design/js/custom/user.js') }}"></script>
@endsection
