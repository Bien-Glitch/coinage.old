@extends('layouts.dashboard')


@section('content')
    <div class="nk-block nk-block-lg">

        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Create Offer</h5>
                </div>
                <form action="#" class="gy-3" name="formA">
                    @csrf
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Percentage</label>
                                <span class="form-note">Specify the increase or decrease of the current crypto price</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="custom-control {{--custom-control-sm--}} custom-radio">
                                    <input class="custom-control-input crypto_type" type="radio" name="crypto_type" id="crypto-btc" value="BTC" checked>
                                    <label class="custom-control-label" for="crypto-btc">BITCOIN</label>
                                </div>
                                <div class="custom-control {{--custom-control-sm--}} custom-radio">
                                    <input class="custom-control-input crypto_type" type="radio" name="crypto_type" id="crypto-eth" value="ETH">
                                    <label class="custom-control-label" for="crypto-eth">ETHEREUM</label>
                                </div>
                                <div class="custom-control {{--custom-control-sm--}} custom-radio">
                                    <input class="custom-control-input crypto_type" type="radio" name="crypto_type" id="crypto-ltc" value="LTC">
                                    <label class="custom-control-label" for="crypto-ltc">LITECOIN</label>
                                </div>
                                <div class="custom-control {{--custom-control-sm--}} custom-radio">
                                    <input class="custom-control-input crypto_type" type="radio" name="crypto_type" id="crypto-xrp" value="XRP">
                                    <label class="custom-control-label" for="crypto-xrp">X-RIPPLE</label>
                                </div>
                                <div class="custom-control {{--custom-control-sm--}} custom-radio">
                                    <input class="custom-control-input crypto_type" type="radio" name="crypto_type" id="crypto-doge" value="DOGE">
                                    <label class="custom-control-label" for="crypto-doge">DOGECOIN</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="percentage" class="form-label">Percentage</label>
                                <span class="form-note">Specify the increase or decrease of the current crypto price</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="percentage" value="10">
                                    <span class="form-note">(<span id="crypto-percent"></span>% of <span id="crypto-current"></span> <i class="icon ni ni-arrow-long-right"></i> <span id="crypto-total"></span>)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Minimum Amount</label>
                                <span class="form-note">Minimum price your can sell (in NGN)</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="site-copyright" value="N1,000">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Maximum Amount</label>
                                <span class="form-note">Maximum price your can sell (in NGN)</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="site-copyright" value="N100,000">
                                </div>
                            </div>
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
    <script src="{{ asset('design/js/custom/main.js') }}"></script>
@endsection

