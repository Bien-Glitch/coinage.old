@extends('layouts.dashboard')


@section('content')
    <div class="nk-block nk-block-lg">

        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Create Offer</h5>
                </div>
                <form action="{{ route('offers.store') }}" method="POST" class="gy-3" name="formA">
                    @csrf
                    <x-offer-form />
                </form>
            </div>
        </div><!-- card -->
    </div>
    <script src="{{ asset('design/js/custom/main.js') }}"></script>
@endsection

