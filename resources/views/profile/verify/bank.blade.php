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
				<form action="" method="POST" id="verify-acc-no">
					@csrf
					<div class="row g-4">
						<div class="col-md-12">
							<div class="form-group">
								<div class="form-label-group">
									<label class="form-label">Account Number<span class="text-danger">*</span></label>
								</div>
								<div class="input-group mb-3">
									<input type="number" name="account_number" id="account_number" value="{{ old('account_number') }}" class="form-control form-control-lg">
									<div class="input-group-append">
										<button class="btn btn-outline-primary get-bank-info" type="submit">Verify</button>
									</div>

									<span id="account_numberValid" role="alert">
                                        <strong></strong>
                                    </span>
								</div>
							</div>
						</div><!-- .col -->
					</div><!-- .row -->
				</form>

				<div class="text-center throbber" style="display: none"><img src="{{ asset('dashboard/assets/images/jsTree/throbber.gif') }}" alt="{{ __('Loading') }}" class="img-fluid" width="20px"></div>

				<form action="{{ route('profile.bank.update') }}" method="POST" id="verify-bank-form">
					<section id="verify-account-wrapper" style="display: none">
						<div class="row g-4">
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-label-group">
										<label class="form-label">Account Name <span class="text-danger">*</span></label>
									</div>
									<div class="form-control-group">
										<input type="text" name="account_name" id="account_name" class="form-control" disabled>

										<span id="account_nameValid" role="alert">
	                                        <strong></strong>
	                                    </span>
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
											<select class="form-control" name="bank_name" id="bank_name" data-search="on" disabled>
												<option value="fidelity">Input you account number first</option>
												{{--<option value="firstbank">First Bank</option>
												<option value="GTB"> Guarantee Trust Bank</option>--}}
											</select>
											<span id="bank_nameValid" role="alert">
		                                        <strong></strong>
		                                    </span>
										</div>
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
											<select class="form-control" name="account_type">
												<option value="savings">Savings Account</option>
												<option value="current">Current Account</option>
											</select>
										</div>
										<span id="account_typeValid" role="alert">
	                                        <strong></strong>
	                                    </span>
									</div>
								</div>
							</div><!-- .col -->


							{{--<div class="col-md-6">
								<div class="form-group">
									<div class="form-label-group">
										<label class="form-label">Bank Code <span class="text-danger">*</span></label>
									</div>
									<div class="form-control-group">
										<input type="text" name="bank_code" class="form-control ">
									</div>
								</div>
							</div><!-- .col -->--}}
						</div><!-- .row -->
						<div class="nk-kycfm-action pt-2 text-center">
							<button type="submit" class="btn btn-lg btn-primary">Complete Verification</button>
						</div>
					</section>
				</form>
			</div><!-- .nk-kycfm-content -->

		</div><!-- .nk-kycfm -->
	</div><!-- .card -->
	<script src="{{ asset('design/js/custom/user.js') }}"></script>
@endsection
