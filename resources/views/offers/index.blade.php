@extends('layouts.dashboard')

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">All Offers</h2>
                <div class="nk-block-des">
                    <p>See full list of offers created</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <ul class="nk-block-tools gx-3">
                    <li class="order-md-last"><a href="#" class="btn btn-primary"><span>Filter</span></a></li>
                    <li class="order-md-last"><a href="/offers/create" class="btn btn-primary"><span>Create Offer</span></a></li>
                    <li>
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <select class="form-control">
                                    <option value="" class="form-control">Filter By Crypto</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- .nk-block-head -->

    <div class="nk-block nk-block-sm">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h6 class="nk-block-title">All Orders</h6>
                </div>
                <ul class="nk-block-tools gx-3">
                    <!-- <li>
                        <div class="form-group">
                            <div class="custom-control custom-control-xs custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox">
                                <label class="custom-control-label" for="checkbox"><span class="d-none d-sm-inline-block">Show</span> Cancelled</label>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li>
                        <a href="#" class="search-toggle toggle-search btn btn-icon btn-trigger" data-target="search"><em class="icon ni ni-search"></em></a>
                    </li> -->
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle btn btn-icon btn-trigger mx-n2" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-setting"></em></a>
                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                <ul class="link-check">
                                    <li><span>Show</span></li>
                                    <li class="active"><a href="#">10</a></li>
                                    <li><a href="#">20</a></li>
                                    <li><a href="#">50</a></li>
                                </ul>
                                <ul class="link-check">
                                    <li><span>Order</span></li>
                                    <li class="active"><a href="#">DESC</a></li>
                                    <li><a href="#">ASC</a></li>
                                </ul>
                                <ul class="link-check">
                                    <li><span>Density</span></li>
                                    <li class="active"><a href="#">Regular</a></li>
                                    <li><a href="#">Compact</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul><!-- .nk-block-tools -->
            </div>
            <div class="search-wrap search-wrap-extend" data-search="search">
                <div class="search-content">
                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                    <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by user">
                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                </div>
            </div><!-- .search-wrap -->
        </div><!-- .nk-block-head -->

        <div class="tranx-list tranx-list-stretch card card-bordered">
            <div class="tranx-item">
                <div class="tranx-col">
                    <div class="tranx-info">
                        <div class="tranx-badge">
                            <span class="tranx-icon icon ni ni-sign-btc"></span>
                        </div>
                        <div class="tranx-data">
                            <div class="tranx-label">Buy Bitcoin</div>
                            <div class="tranx-date">Nov 12, 2019 11:34 PM</div>
                        </div>
                    </div>
                </div>
                <div class="tranx-col">
                    <div class="tranx-amount">
                        <div class="number">0.5384 <span class="currency currency-btc">BTC</span></div>
                        <div class="number-sm">3,980.93 <span class="currency currency-usd">USD</span></div>
                    </div>
                </div>
            </div><!-- .nk-tranx-item -->
            <div class="tranx-item">
                <div class="tranx-col">
                    <div class="tranx-info">
                        <div class="tranx-badge">
                            <span class="tranx-icon icon ni ni-sign-eth"></span>
                        </div>
                        <div class="tranx-data">
                            <div class="tranx-label">Buy Bitcoin</div>
                            <div class="tranx-date">Nov 12, 2019 11:34 PM</div>
                        </div>
                    </div>
                </div>
                <div class="tranx-col">
                    <div class="tranx-amount">
                        <div class="number">0.5384 <span class="currency currency-btc">BTC</span></div>
                        <div class="number-sm">3,980.93 <span class="currency currency-usd">USD</span></div>
                    </div>
                </div>
            </div>
            <div class="tranx-item">
                <div class="tranx-col">
                    <div class="tranx-info">
                        <div class="tranx-badge">
                            <span class="tranx-icon icon ni ni-sign-eth"></span>
                        </div>
                        <div class="tranx-data">
                            <div class="tranx-label">Buy Bitcoin</div>
                            <div class="tranx-date">Nov 12, 2019 11:34 PM</div>
                        </div>
                    </div>
                </div>
                <div class="tranx-col">
                    <div class="tranx-amount">
                        <div class="number">0.5384 <span class="currency currency-btc">BTC</span></div>
                        <div class="number-sm">3,980.93 <span class="currency currency-usd">USD</span></div>
                    </div>
                </div>
            </div>
            <div class="tranx-item">
                <div class="tranx-col">
                    <div class="tranx-info">
                        <div class="tranx-badge">
                            <span class="tranx-icon icon ni ni-sign-eth"></span>
                        </div>
                        <div class="tranx-data">
                            <div class="tranx-label">Buy Bitcoin</div>
                            <div class="tranx-date">Nov 12, 2019 11:34 PM</div>
                        </div>
                    </div>
                </div>
                <div class="tranx-col">
                    <div class="tranx-amount">
                        <div class="number">0.5384 <span class="currency currency-btc">BTC</span></div>
                        <div class="number-sm">3,980.93 <span class="currency currency-usd">USD</span></div>
                    </div>
                </div>
            </div>
            <div class="tranx-item">
                <div class="tranx-col">
                    <div class="tranx-info">
                        <div class="tranx-badge">
                            <span class="tranx-icon icon ni ni-sign-eth"></span>
                        </div>
                        <div class="tranx-data">
                            <div class="tranx-label">Buy Bitcoin</div>
                            <div class="tranx-date">Nov 12, 2019 11:34 PM</div>
                        </div>
                    </div>
                </div>
                <div class="tranx-col">
                    <div class="tranx-amount">
                        <div class="number">0.5384 <span class="currency currency-btc">BTC</span></div>
                        <div class="number-sm">3,980.93 <span class="currency currency-usd">USD</span></div>
                    </div>
                </div>
            </div>
        </div><!-- .card -->
        <div class="text-center pt-4">
            <a href="#" class="link link-soft"><em class="icon ni ni-redo"></em><span>Load More</span></a>
        </div>
    </div>
@endsection
