@extends('layouts.dashboard')


@section('content')
    <div class="nk-block nk-block-lg">

        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Create Wallet</h5>
                </div>
                @if (session('message'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                        <strong><i class="fa fa-thumbs-up"></i></strong> {{session('message')}}
                    </div>
                @endif
                <form action="{{route('wallets.store')}}" method="POST" class="gy-3" name="formA">
					@csrf
					<div class="form-group">
						<label class="form-label">Crypto Type</label>
						<div class="form-control-wrap">
							<select name="crypto_type" class="form-select form-control form-control-lg">
								<option value="btc">Bitcoin</option>
								<option value="eth">Ethereum</option>
								<option value="usdteth">Tether</option>
							</select>
						</div>
					</div>

					<div class="row g-3">
						<div class="col-lg-7 offset-lg-5">
							<div class="form-group mt-2">
								<button type="submit" class="btn btn-lg btn-primary">Create</button>
							</div>
						</div>
					</div>
                </form>
            </div>

        </div><!-- card -->
    </div>
    <script src="{{ asset('design/js/custom/user.js') }}"></script>
@endsection

