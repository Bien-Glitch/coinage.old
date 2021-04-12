@extends('layouts.app')

@section('content')
<div class="container body">
    <section class="row">
        <div class="col-lg-6 d-none d-lg-flex">
            <div class="d-flex justify-content-center justify-content-lg-start">
                <img src="./design/img/feed~man.svg" class="img-fluid" alt="" style="width: 100%;">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex flex-column justify-content-center h-100">
                <h4 class="text-uppercase text-purple mb-5">register</h4>
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="text-muted">Username</label>
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-user-edit p-2"></i>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="surname" class="text-muted">Surname</label>
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-user p-2"></i>
                            <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}" required>

                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="other_names" class="text-muted">Other Names</label>
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-user p-2"></i>
                            <input type="text" name="other_names" id="other_names" class="form-control @error('other_names') is-invalid @enderror" value="{{ old('other_names') }}" required>

                            @error('other_names')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

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
                        <label for="phone" class="text-muted">Phone Number</label>
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-phone p-2"></i>
                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-muted">Password</label>
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
                        <label for="password_validate" class="text-muted">Confirm Password</label>
                        <div class="input-group align-items-center">
                            <i class="text-purple fad fa-lock p-2"></i>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="my-5">
                            <button type="submit" class="btn btn-purple w-100">REGISTER</button>
                        </div>
                        <div class="text-center">Already a member? <a href="/login" class="text-purple">Login</a></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
