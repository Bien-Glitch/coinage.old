@extends('layouts.app')
@section('content')
        <div class="container-fluid body">
            <section class="row">
                <div class="col-lg-4">
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <img src="./design/img/buy~sell.svg" class="img-fluid" alt="" style="height: 400px">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <div class="header text-purple">
                            <div>BUY & SELL</div>
                            <div>YOUR CRYPTO WITH COINAGE</div>
                        </div>
                        <div>
                            <p>Coinage is a leading peer-to-peer crypto trading platform where you can safely trade with millions of users, using multiple payment methods</p>
                            <p>Buy crypto with top payment methods in Nigeria</p>
                            <div class="d-flex flex-column flex-sm-row flex-wrap">
                                <a href="" class="btn btn-outline-purple mx-sm-1 my-sm-0 my-1">Bank Transfers</a>
                                <a href="" class="btn btn-outline-purple mx-sm-1 my-sm-0 my-1">Bank Account</a>
                                <a href="" class="btn btn-outline-purple mx-sm-1 my-sm-0 my-1">USSD</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="row">
                <div class="col-12 border-bottom bg-light py-4">
                    <div class="container d-flex flex-column text-uppercase py-4">
                        <div class="header text-center">
                            <div class="">how does <span class="text-purple">coinage</span> work</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/create~acc.svg" class="img-fluid" alt="" style="height: 200px">
                                    <div class="font-weight-bolder"><span class="text-purple">create</span> an account</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/choose~buy~sell.svg" class="img-fluid" alt="" style="height: 200px">
                                    <div class="font-weight-bolder"><span class="text-purple">choose</span> buy or sell</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/search~offers.svg" class="img-fluid" alt="" style="height: 200px">
                                    <div class="font-weight-bolder"><span class="text-purple">search</span> for offers</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/negotiate~close~deal.svg" class="img-fluid" alt="" style="height: 200px">
                                    <div class="font-weight-bolder"><span class="text-purple">negotiate</span> &amp; close deal</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 border-bottom py-4">
                    <div class="container d-flex flex-column">
                        <div class="row">
                            <div class="col-lg-3 col-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/flutterware~secure.svg" class="img-fluid" alt="" style="height: 40px">
                                    <div class="text-center small mt-2">Secured by <span class="text-purple">Flutterwave</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/crypto~offers.svg" class="img-fluid" alt="" style="height: 40px">
                                    <div class="text-center small mt-2">Offers in 50+ Cryptos</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/trusted~offers.svg" class="img-fluid" alt="" style="height: 40px">
                                    <div class="text-center small mt-2">Thousands of Trusted Offers</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6 mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="./design/img/globally~available.svg" class="img-fluid" alt="" style="height: 40px">
                                    <div class="text-center small mt-2">Available Globally</div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-lg-2 col-lg-8">
                            <div class="header text-center">
                                <div class="mb-3">Choose from varieties of methods to buy or sale crypto.</div>
                                <p>Select a payment method you like and trade directly with other people<br> just like you!</p>
                            </div>
                        </div>

                        <div class="offset-xl-1 col-xl-10">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 payment-method mb-4">
                                    <div class="d-flex flex-md-column flex-lg-row align-items-center p-3">
                                        <div class="d-flex justify-content-end" style="width: 30%"><img src="./design/img/mastercard.svg" alt=""></div>
                                        <span class="d-flex flex-fill justify-content-center text-purple ml-lg-2">Mastercard</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 payment-method mb-4">
                                    <div class="d-flex flex-md-column flex-lg-row align-items-center p-3">
                                        <div class="d-flex justify-content-end" style="width: 30%"><img src="./design/img/bank~transfer.svg" alt=""></div>
                                        <span class="d-flex flex-fill justify-content-center text-purple ml-lg-2">Bank Transfer</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 payment-method mb-4">
                                    <div class="d-flex flex-md-column flex-lg-row align-items-center p-3">
                                        <div class="d-flex justify-content-end" style="width: 30%"><img src="./design/img/visa.svg" alt=""></div>
                                        <span class="d-flex flex-fill justify-content-center text-purple ml-lg-2">Visa</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 payment-method mb-4">
                                    <div class="d-flex flex-md-column flex-lg-row align-items-center p-3">
                                        <div class="d-flex justify-content-end" style="width: 30%"><img src="./design/img/mobile~transfer.svg" alt=""></div>
                                        <span class="d-flex flex-fill justify-content-center text-purple ml-lg-2">POS</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 payment-method mb-4">
                                    <div class="d-flex flex-md-column flex-lg-row align-items-center p-3">
                                        <div class="d-flex justify-content-end" style="width: 30%"><img src="./design/img/ussd.svg" alt=""></div>
                                        <span class="d-flex flex-fill justify-content-center text-purple ml-lg-2">USSD</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 payment-method mb-4">
                                    <div class="d-flex flex-md-column flex-lg-row align-items-center p-3">
                                        <div class="d-flex justify-content-end" style="width: 30%"><img src="./design/img/qr~code.svg" alt=""></div>
                                        <span class="d-flex flex-fill justify-content-center text-purple ml-lg-2">QR Code</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center py-4"><a href="" class="btn btn-purple text-uppercase font-weight-bold">View all offers</a></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 border-bottom bg-light py-4">
                    <div class="container d-flex flex-column py-4">
                        <div class="header text-center">
                            <div class="">Testimonials</div>
                        </div>
                        <div class="text-center">Hear what some of our satisfied users have to say about coinage</div>
                        <div class="row">
                        </div>
                    </div>
                </div>

                <div class="col-12 border-bottom py-4">
                    <div class="container d-flex flex-column py-4">
                        <div class="header text-center">
                            <div class="">Things you can do with coinage</div>
                        </div>
                        <div class="text-center mb-5">Elevate your financial freedom to a higher plane with coinage</div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="./design/img/check.svg" alt=""></div>
                                    <span class="font-weight-bold mb-3">Buy Crypto online</span>
                                    <p class="text-center">Buy Bitcoin on Coinage in real time. Trade with other users online using our live chat.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="./design/img/check.svg" alt=""></div>
                                    <span class="font-weight-bold mb-3">Sell Crypto</span>
                                    <p class="text-center">Sell your Bitcoin at your chosen rate, and get paid in one of numerous payment methods.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="./design/img/check.svg" alt=""></div>
                                    <span class="font-weight-bold mb-3">Trade securely</span>
                                    <p class="text-center">Your Money is held in our secure wallet until the trade is completed successfully.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="./design/img/check.svg" alt=""></div>
                                    <span class="font-weight-bold mb-3">Get a free fiat wallet</span>
                                    <p class="text-center">Get a life-time free fiat wallet to hold your fiat currencies.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="./design/img/check.svg" alt=""></div>
                                    <span class="font-weight-bold mb-3">Earn extra income</span>
                                    <p class="text-center">Take advantage of our Affiliate Program to create a steady income stream.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="./design/img/check.svg" alt=""></div>
                                    <span class="font-weight-bold mb-3">Build your reputation</span>
                                    <p class="text-center">Our user feedback system enables you to identify trusted and experienced peers to trade with.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <div class="overlay-wrapper position-absolute shadow">
                        <img src="./design/img/bg~full.svg" class="" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-around align-items-center position-relative" style="height: 300px">
                        <div class="text-center">
                            <p class="font-weight-bold mb-4 h2">Start trading on coinage</p>
                            <P>Sign up today to start buying or selling your crypto, hassle-free.</P>
                        </div>
                        <a href="" class="btn btn-purple">CREATE ACCOUNT</a>
                    </div>
                </div>
            </section>
        </div>
 @endsection
