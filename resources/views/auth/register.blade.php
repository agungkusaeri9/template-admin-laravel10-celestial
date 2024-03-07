@extends('auth.app')
@section('title')
    Register
@endsection
@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form class="pt-3" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text"
                                    class="form-control  @error('name') is-invalid @enderror form-control-lg" id="name"
                                    placeholder="Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror form-control-lg" id="email"
                                    name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                    class="form-control @error('password') is-invalid @enderror  form-control-lg"
                                    id="password" name="password" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror  form-control-lg"
                                    id="password_confirmation" name="password_confirmation"
                                    placeholder="Password Confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                    UP</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection
