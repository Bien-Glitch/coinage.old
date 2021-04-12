@extends('layouts.app')

@section('content')
<div class="container body">
    <section class="row">
        <div class="col-lg-6 d-none d-lg-flex">
            <div class="d-flex justify-content-center justify-content-lg-start">
                <img src="./design/img/bg~left.svg" class="img-fluid" alt="" style="width: 100%;height: 500px;">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex flex-column justify-content-center h-100">
                <h4 class="text-uppercase text-purple mb-5">login</h4>
                <form method="POST" action="{{route('login')}}">
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

                    {{-- <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <label for="password" class="text-muted">Password</label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-purple font-weight-bold">Forgot Password?</a>
                            @endif
                        </div>
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-lock p-2"></i>
                            <input type="password" name="" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <label for="password" class="text-muted">Password</label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-purple font-weight-bold">Forgot Password?</a>
                            @endif
                        </div>
                        {{-- <label for="password" class="text-muted">Password</label> --}}
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-lock p-2"></i>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="my-5">
                            <button type="submit" class="btn btn-purple w-100">LOGIN</button>
                        </div>
                        <div class="text-center">New User? <a href="./register.html" class="text-purple">Create Account</a></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
