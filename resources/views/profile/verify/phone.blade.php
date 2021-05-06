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
                        <form action="/profile/verify/phone/sendOtp" method="POST">
                            @csrf
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label">Phone Number<span class="text-danger">*</span></label>
                            </div>
                            @if (session('message'))
                                <span class="form-note text-success font-weight-bold">{{session('message')}}</span>
                            @endif
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Phone">

                                <div class="input-group-append">
                                  <button class="btn btn-outline-primary" type="submit">Send</button>
                                </div>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </form>
                    </div><!-- .col -->
                <div class="col-md-8">
                    <form action="/profile/verify/phone/verifyOtp" method="POST">
                        @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label">Verifiction Code <span class="text-danger">*</span></label>
                        </div>
                        <div class="input-group mb-3">

                            <input type="tel" class="form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required placeholder="Phone">

                            <div class="input-group-append">
                              <button class="btn btn-outline-primary" type="submit">Verify</button>
                            </div>

                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    </form>
                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .nk-kycfm-content -->

    </div><!-- .nk-kycfm -->
</div><!-- .card -->
@endsection
