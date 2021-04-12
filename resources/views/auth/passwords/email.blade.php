@extends('layouts.app')

@section('content')
<div class="container body">
    <section class="row">
        <div class="col-lg-6 d-none d-lg-flex">
            <div class="d-flex justify-content-center justify-content-lg-start">
                <img src="{{asset('design/img/man~pc.svg')}}" class="img-fluid" alt="" style="width: 100%;height: 500px">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex flex-column justify-content-center h-100">
                <h4 class="text-uppercase text-purple">forgot password</h4>
                <div class="mb-5">Enter E-Mail Address to recover password</div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="text-muted">E-Mail Address</label>
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-envelope p-2"></i>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="my-5">
                            <button type="submit" class="btn btn-purple w-100">RECOVER PASSWORD</button>
                        </div>
                        <div class="text-center">Remember Password? <a href="/login" class="text-purple">Login</a></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
