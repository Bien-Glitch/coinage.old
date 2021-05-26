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
                            <td><a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#buyDetails">Buy</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->

</div><!-- .components-preview -->
<div class="modal fade" tabindex="-1" id="buyDetails">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="buysell-block">
                    <form action="#" class="buysell-form">

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">I want to pay</label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control form-control-lg form-control-number" id="buy-amount" name="bs-amount" placeholder="">
                                <div class="form-dropdown">
                                    <div class="text">NGN</div>

                                </div>
                            </div>

                        </div><!-- .buysell-field -->

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">I will recieve</label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control form-control-lg form-control-number" id="recieve-amount" name="bs-amount" placeholder="0.055960">
                                <div class="form-dropdown">
                                    <div class="text">BTC</div>

                                </div>
                            </div>

                        </div><!-- .buysell-field -->


                        <div class="buysell-field form-action d-flex">
                            <div class="col-4">
                                <a href="#" class="btn btn-lg btn-block btn-danger " data-dismiss="modal" aria-label="Close data-toggle="modal" data-target="#buy-coin">Cancel</a>
                            </div>
                            <div class="col-8">
                                <a href="#" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#buy-coin">Continue to Buy</a>
                            </div>
                        </div><!-- .buysell-field -->
                        <div class="form-note text-base text-center">Note: our transfer fee included, <a href="#">see our fees</a>.</div>
                    </form><!-- .buysell-form -->
                </div><!-- .buysell-block -->
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Modal Footer Text</span>
            </div>
        </div>
    </div>
</div>
@endsection
