@extends('layouts.dashboard')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#btc">BTC</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#eth">ETH</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#ltc">LTC</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#xrp">XRP</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#doge">DOGE</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="btc">
        <div class="tranx-col">
            <div class="tranx-info">
                <div class="tranx-badge">
                    <span class="tranx-icon icon ni ni-sign-btc"></span>
                </div>
                <div class="tranx-data">
                    <div class="tranx-label">gggggggg</div>
                    <div class="tranx-date" hidden>jjjjjjj</div>
                </div>
            </div>
        </div>
        <div class="tranx-col">
            <div class="tranx-amount">
                <div class="number">
                    {{--{{ $offer }}--}}
                    <strong class="crypto-total"></strong>
                    <span class="crypto-currency">lllllll</span>
                </div>
                <div class="number-sm">
                    <span>Current Market Value:</span> <strong class="crypto-current"></strong>
                    <span class="fiat-currency currency-usd">/ 1sssssss</span>
                </div>
                <span class="number-sm">
                    --------
                    <span>(min - max)</span>
                </span>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="eth">
        <p>content</p>
    </div>
    <div class="tab-pane" id="ltc">
        <p>contnet</p>
    </div>
    <div class="tab-pane" id="xrp">
        <p>contnet</p>
    </div>
    <div class="tab-pane" id="doge">
        <p>contnet</p>
    </div>
</div>
@endsection
