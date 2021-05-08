@extends('layouts.dashboard')


@section('content')
    <div class="nk-block nk-block-lg">

        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Create Offer</h5>
                </div>
                @if (session('message'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                        <strong><i class="fa fa-thumbs-up"></i></strong> {{session('message')}}
                    </div>
                @endif
                <form action="{{ route('offers.store') }}" method="POST" class="gy-3" name="formA">
                    @csrf
                    <x-offer-form />
                </form>
            </div>
        </div><!-- card -->
    </div>
    <script src="{{ asset('design/js/custom/main.js') }}"></script>
@endsection

