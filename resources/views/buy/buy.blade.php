@extends('layouts.dashboard')
@section('content')
	<div class="components-preview wide-md mx-auto">
		<div class="nk-block-head nk-block-head-lg wide-sm">
			<div class="nk-block-head-content">
				<h2 class="nk-block-title fw-normal">Buy crypto from coinage P2P</h2>

			</div>
		</div><!-- .nk-block-head -->
		<div class="nk-block nk-block-lg">
			<div class=" d-flex ">
				<div class="flex-fill mr-1"><a href="{{route('buy.btc')}}" class="btn btn-primary center text-white @if(Route::is('buy.btc')) active @endif">BTC</a></div>
				<div class="flex-fill mr-1"><a href="{{route('buy.eth')}}" class="btn btn-primary center text-white @if(Route::is('buy.eth')) active @endif">ETH</a></div>
				<div class="flex-fill mr-1"><a href="{{route('buy.xrp')}}" class="btn btn-primary center text-white @if(Route::is('buy.xrp')) active @endif">XRP</a></div>
				<div class="flex-fill mr-1"><a href="{{route('buy.ltc')}}" class="btn btn-primary center text-white @if(Route::is('buy.ltc')) active @endif">LTC</a></div>
				<div class="flex-fill mr-1"><a href="{{route('buy.doge')}}" class="btn btn-primary center text-white @if(Route::is('buy.doge')) active @endif">DOGE</a></div>
			</div>
			<div class="card card-preview border-0">
				<div class="card-inner">
					<table class="datatable-init nowrap table">
						<thead>
						<tr>
							<th>Price</th>
							<th>Seller</th>
							<th>Limit</th>
							<th>Trade</th>

						</tr>
						</thead>
						<tbody>
						@foreach ($offers as $offer )
							<tr>
								<td>
									{{-- Current market value + the percerntage value --}}
									<span id="percentage">{{$offer->percentage}}</span>
									<strong class="crypto-total"></strong>
								</td>
								<td>{{$offer->user->username}}</td>
								<td>{{$offer->min_amount}} - {{$offer->max_amount}}</td>
								<td>
									<a class="btn btn-success btn-sm text-white buy-crypto" data-id="{{ $offer->id }}" data-percentage="{{ $offer->percentage }}" data-crypto-type="{{ $offer->crypto_type }}" data-uri="{{ route('buy.show', $offer->id) }}">
										Buy
									</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div><!-- .card-preview -->
		</div> <!-- nk-block -->

	</div><!-- .components-preview -->

	<script>
		$(function () {
			let pay_amount = 0,
				crypto_amount = 0,
				currentCryptoVar = undefined,
				buy_amount_inp = '#buy_amount',
				receive_amount_inp = '#receive_amount',
				sell_crypto_btn = '#buy-crypto-form button[type="submit"]';

			// On click 'buy' crypto button
			$('.buy-crypto').on('click', function (e) {
				e.preventDefault();
				let uri = $(this).data('uri'),
					crypto_type = ($(this).data('crypto-type')).toLowerCase();

				percentage = $(this).data('percentage');

				loadPageData('#user-modal-wrapper', uri, null, 'Buy Crypto', '#show-buy-crypto-modal', () => {
					let min_amount = $(buy_amount_inp).attr('min'),
						max_amount = $(buy_amount_inp).attr('max');

					/**
					 * Get current price for given crypto and update specified fields.
					 * @param _crypto_type
					 */
					function currentCryptoValue(_crypto_type) {
						(function currentCryptoValue() {
							currentCryptoVar = setTimeout(() => {
								selectCryptoOffer(_crypto_type, function () {
									pay_amount = $(buy_amount_inp).val();
									if (typeof _price !== 'undefined') {
										if (pay_amount.length > 0 && receive_amount_inp.length > 0)
											$(receive_amount_inp).val(Math.fround(pay_amount / _price).toFixed(8));
									} else
										$(receive_amount_inp).val('');
								});
								currentCryptoValue();
							}, 30000);
						})();
					}

					$(buy_amount_inp).on({
						input: function (e) {
							let target = e.currentTarget;
							pay_amount = $(target).val();
							$(sell_crypto_btn).prop({disabled: true});

							selectCryptoOffer(crypto_type, function () {
								if (typeof _price !== 'undefined') {
									if ($(target).val().length > 0)
										if (Math.round(pay_amount) < Math.round(min_amount))
											displayError(formAttr('#buy-crypto-form').form, formAttr('#buy-crypto-form').that, {buy_amount: 'Inputted amount is less than required minimum amount!'});
										else if (Math.round(pay_amount) > Math.round(max_amount))
											displayError(formAttr('#buy-crypto-form').form, formAttr('#buy-crypto-form').that, {buy_amount: 'Inputted amount is greater than required minimum amount!'});
										else {
											crypto_amount = Math.fround(pay_amount / _price).toFixed(8);
											$(receive_amount_inp).val(crypto_amount);
											$(sell_crypto_btn).prop({disabled: false});
											removeInvalidFeedback('#buy-crypto-form #buy_amount');
										}
									else {
										$(receive_amount_inp).val('');
										removeInvalidFeedback('#buy-crypto-form #buy_amount');
									}
									removeInvalidFeedback('#buy-crypto-form #receive_amount');
								} else
									displayError(formAttr('#buy-crypto-form').form, formAttr('#buy-crypto-form').that, {receive_amount: 'Unable to get current crypto price. Please check your internet connection and try again!'});
							});
						},
						blur: function (e) {
							let target = e.currentTarget;
							$(target).val(Math.fround($(target).val()).toFixed(2));
						}
					});

					$(receive_amount_inp).on({
						input: function (e) {
							let target = e.currentTarget;
							crypto_amount = $(target).val();
							$(sell_crypto_btn).prop({disabled: true});

							selectCryptoOffer(crypto_type, function () {
								if (typeof _price !== 'undefined') {
									pay_amount = (crypto_amount * _price);
									if ($(target).val().length > 0) {
										$(buy_amount_inp).val(Math.fround(pay_amount).toFixed(2));

										if (Math.round(pay_amount) < Math.round(min_amount))
											displayError(formAttr('#buy-crypto-form').form, formAttr('#buy-crypto-form').that, {buy_amount: 'Amount is less than required minimum amount'});
										else if (Math.round(pay_amount) > Math.round(max_amount))
											displayError(formAttr('#buy-crypto-form').form, formAttr('#buy-crypto-form').that, {buy_amount: 'Amount is greater than required minimum amount'});
										else {
											$(sell_crypto_btn).prop({disabled: false});
											removeInvalidFeedback('#buy-crypto-form #buy_amount');
										}
									} else {
										$(buy_amount_inp).val('');
										removeInvalidFeedback('#buy-crypto-form #buy_amount');
									}
								} else
									displayError(formAttr('#buy-crypto-form').form, formAttr('#buy-crypto-form').that, {buy_amount: 'Unable to get current crypto price. Please check your internet connection and try again!'});
							});
						},
						blur: function (e) {
							let target = e.currentTarget;
							$(target).val(Math.fround($(target).val()).toFixed(8));
						}
					});
					$(sell_crypto_btn).prop({disabled: true});
					currentCryptoValue(crypto_type);

					$('#show-buy-crypto-modal').on('hidden.bs.modal', function () {
						clearTimeout(currentCryptoVar);
					})
				});
			});
		});
	</script>
@endsection
