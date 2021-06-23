<div class="modal fade" tabindex="-1" id="show-buy-crypto-modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="buysell-block">
					<form action="" class="buysell-form" id="buy-crypto-form">

						<div class="buysell-field form-group">
							<div class="form-label-group">
								<label class="form-label" for="buysell-amount">I want to pay</label>
							</div>
							<div class="form-control-group">
								<input type="number" class="form-control form-control-lg form-control-number" id="buy_amount" name="buy_amount" min="{{ $offer->min_amount }}" max="{{ $offer->max_amount }}" placeholder="" required>
								<div class="form-dropdown">
									<div class="text">NGN</div>
								</div>
								<span id="buy_amountValid" role="alert">
	                                <strong></strong>
	                            </span>
								<small class="text-muted">₦<span>{{ $offer->min_amount }}</span> - ₦<span>{{ $offer->max_amount }}</span></small>
							</div>

						</div><!-- .buysell-field -->

						<div class="buysell-field form-group">
							<div class="form-label-group">
								<label class="form-label" for="buysell-amount">I will recieve</label>
							</div>
							<div class="form-control-group">
								<input type="text" class="form-control form-control-lg form-control-number" id="receive_amount" name="recieve_amount" placeholder="{{ old('') }}">
								<div class="form-dropdown">
									<div class="text">{{ $offer->crypto_type }}</div>

								</div>
							</div>

						</div><!-- .buysell-field -->


						<div class="buysell-field form-action d-flex">
							<div class="col-4">
								<a href="#" class="btn btn-lg btn-block btn-danger " data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#buy-coin">Cancel</a>
							</div>
							<div class="col-8">
								<button type="submit" class="btn btn-lg btn-block btn-primary">Continue to Buy</button>
							</div>
						</div><!-- .buysell-field -->
						<div class="form-note text-base text-center">Note: our transfer fee included, <a href="#">see our fees</a>.</div>
					</form><!-- .buysell-form -->
				</div><!-- .buysell-block -->
			</div>
			<div class="modal-footer bg-light">
				<span class="sub-text">Current Market Value: <span id="crypto-current"></span></span>
			</div>
		</div>
	</div>
</div>
