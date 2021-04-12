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
        <div class="col-12 border-bottom py-4">
            <div class="d-flex flex-column py-4">
                <div class="header text-center">
                    <div class="">Our Team</div>
                    <blockquote class="offset-lg-3 col-lg-6 text-center">Coinage started with a simple mission: to empower the forgotten four billion unbanked and underbanked, so they ave control of their money in a way they've never have before.</blockquote>
                </div>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="col-lg-4 text-center text-md-left mb-3">
                                <img src="./design/img/negotiate~close~deal.svg" alt="">
                                <div>
                                    <strong>Mark Zuckerberg, CEO</strong>
                                    <p class="small">Coinage started with a single mission to empower the forgotten four billion unbanked and underbanked, so they have control of their money in a way they've never had before.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center text-md-left mb-3">
                                <img src="./design/img/negotiate~close~deal.svg" alt="">
                                <div>
                                    <strong>Mark Zuckerberg, CEO</strong>
                                    <p class="small">Coinage started with a single mission to empower the forgotten four billion unbanked and underbanked, so they have control of their money in a way they've never had before.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center text-md-left mb-3">
                                <img src="./design/img/negotiate~close~deal.svg" alt="">
                                <div>
                                    <strong>Mark Zuckerberg, CEO</strong>
                                    <p class="small">Coinage started with a single mission to empower the forgotten four billion unbanked and underbanked, so they have control of their money in a way they've never had before.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center my-4">
                <a href="" class="btn btn-purple">OPEN GALLERY</a>
            </div>

            <div class="header text-center">
                <div class="">Our Values</div>
                <blockquote class="offset-lg-3 col-lg-6 text-center">We live and work by three simple values to guide us on our mammoth quest.</blockquote>
            </div>

            <div class="header text-center">
                <div class="">Our Goal</div>
                <blockquote class="offset-lg-3 col-lg-6 text-center">We live and work by three simple values to guide us on our mammoth quest.</blockquote>
            </div>
        </div>

        <div class="col-12 p-0">
            <div class="overlay-wrapper position-absolute shadow">
                <img src="./design/img/bg~full.svg" class="" alt="">
            </div>
            <div class="d-flex flex-column justify-content-around align-items-center position-relative" style="height: 300px">
                <div>
                    <a href="" class="btn btn-purple mx-2">LOGIN</a>
                    <a href="" class="btn btn-outline-purple mx-2">CREATE ACCOUNT</a>
                </div>
            </div>
        </div>
    </section>
</div>
 @endsection
