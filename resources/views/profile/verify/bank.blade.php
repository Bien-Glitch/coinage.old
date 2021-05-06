@extends('layouts.dashboard')
@section('content')
<div class="card card-bordered">
    <div class="nk-kycfm">
        <div class="nk-kycfm-head">
            <div class="nk-kycfm-title">
                <h5 class="title">Bank Account Verification</h5>
                <p class="sub-title">Input your account number and click verify</p>
            </div>
        </div><!-- .nk-kycfm-head -->
        <div class="nk-kycfm-content">
            <div class="nk-kycfm-note">
                <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right"
                    title="Tooltip on right"></em>
                <p>Please type carefully and fill out the form with your personal details. Your can’t edit these details
                    once you submitted the form.</p>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label">Account Number <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control form-control-lg">
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label">Account Type <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-control-group">
                                    <div class="form-control-wrap" data-select2-id="12">
                                        <select class="form-select form-control form-control-lg select2-hidden-accessible"
                                            >
                                            <option value="savings">Savings Account</option>
                                            <option value="current">Current Account</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label">Account Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-control-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control " data-search="on">
                                            <option value="fidelity">Fidelity Bank</option>
                                            <option value="firstbank">First Bank</option>
                                            <option value="GTB"> Guarantee Trust Bank </option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label">Bank Code <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control ">
                            </div>
                        </div>
                    </div><!-- .col -->

                </div><!-- .row -->
                <div class="nk-kycfm-action pt-2  text-center">
                    <button type="submit" class="btn btn-lg btn-primary">Verify</button>
                </div>
            </form>
        </div><!-- .nk-kycfm-content -->

    </div><!-- .nk-kycfm -->
</div><!-- .card -->
@endsection
