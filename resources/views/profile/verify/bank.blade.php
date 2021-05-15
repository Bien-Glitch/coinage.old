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
	<script>
		$(function () {
			let _acc_no,
				acc_no_form = '#verify-acc-no',
				bank_form = '#verify-bank-form',
				acc_no = acc_no_form + ' #account_number',
				verify_account_wrapper = '#verify-account-wrapper';

			function completeBankVerification(form, acc_name, bank_name, acc_no, code) {
				$(form).on('submit', function (e) {
					e.preventDefault();
					let target = this;

					$(target).ajaxSubmit({
						url: formAction(form),
						method: 'POST',
						data: {
							account_number: acc_no,
							account_name: acc_name,
							bank_name: bank_name,
							bank_code: code,
							_token: token
						},
						dataType: 'json',
						beforeSend: function () {
							$(acc_no_form + ' button[type="submit"]').prop({disabled: true});
							$('button[type="submit"]', target).prop({disabled: true});
						},
						complete: function (xhr) {
							let resp = xhr.responseJSON;

							if (xhr.status === 200 || xhr.status === 201) {
								alert('Verification Successful!');
								urlLocation.href = '/profile/verify';
							} else
								displayError(formAttr(target).form, formAttr(target).that, resp.errors)

							$(acc_no_form + ' button[type="submit"]').prop({disabled: false});
							$('button[type="submit"]', target).prop({disabled: false});
						}
					});
				});
			}

			$(acc_no_form).on('submit', function (e) {
				e.preventDefault();
				let target = this;
				_acc_no = $(acc_no).val();

				$.ajax({
					url: 'https://app.nuban.com.ng/api/NUBAN-PKNLOWGQ540?acc_no=' + _acc_no, method: 'GET', timeout: 8000, dataType: 'json', beforeSend: function () {
						$('button[type="submit"]', target).prop({disabled: true});
					}, complete: function (xhr) {
						let resp = xhr.responseJSON;
						if (xhr.status === 200)
							if (resp.error === true) {
								let error = {account_number: resp.message};
								displayError(formAttr(target).form, formAttr(target).that, error);
							} else {
								$(bank_form + ' #account_name').val(resp[0]['account_name']);
								$(bank_form + ' #bank_name').html('<option value="' + resp[0]['bank_name'] + '" selected>' + resp[0]['bank_name'] + '</option>');
								$(verify_account_wrapper).slideDown(800, () => {
									completeBankVerification(bank_form, resp[0]['account_name'], resp[0]['bank_name'], resp[0]['account_number'], resp[0]['bank_code']);
								});
							}
						$('button[type="submit"]', target).prop({disabled: false});
					}, error: function () {
						alert('Please check your internet connection and try again!');
					}
				});
			});
		});
	</script>
@endsection
