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
                        <form action="/profile/verify/phone/sendOtp" method="POST" id="send-phone-otp-form">
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

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Send</button>
                                    </div>
                                    <span id="phoneValid" role="alert">
                                        <strong></strong>
                                    </span>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div><!-- .col -->
                    <div id="verify-otp-wrapper" class="col-md-8" style="display: none">
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
    <script>
        let otp,
            wait_text = '#wait-text',
            wait_count = wait_text + ' #count',
            otp_wrapper = '#verify-otp-wrapper';

        function resendWait(a, b, c, callback = null) {
            $(a).fadeIn(800);
            $(c).text('Resend').prop({disabled: true});

            // Count from x to y
            $({countNum: 60}).animate({countNum: 0}, {
                duration: 60000,
                easing: 'linear',
                step: function () {
                    // What todo on every count
                    $(b).text(this.countNum.toFixed(0));
                },
                complete: function () {
                    $(a).fadeOut(800, function () {
                        $(c).prop({disabled: false});
                    });
                }
            });
        }

        $('#send-phone-otp-form').on('submit', function (e) {
            e.preventDefault();
            let target = this;

            $(target).ajaxSubmit({
                method: 'POST',
                url: formAction(target),
                data: {_token: token},
                dataType: 'json',
                complete: function (xhr) {
                    let resp = xhr.responseJSON;
                    console.log(xhr);
                    if (xhr.status === 200 || xhr.status === 201) {
                        otp = resp['OTP'];
                        displaySuccess(formAttr(target).form, formAttr(target).that, resp.message)

                        if (resp.session['OTP'] !== '' || resp.session['OTP'] !== undefined) {
                            $(otp_wrapper).slideDown(800, () => {
                                resendWait(wait_text, wait_count, '#send-phone-otp-form button[type="submit"]');
                            });
                        } else if ($(otp_wrapper).css('display') !== 'none')
                            $(otp_wrapper).slideUp(800);
                    }
                }
            })
        })
    </script>
@endsection
