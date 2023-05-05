@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center gradient-background" style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; height: 100vh; margin: 0 !important; padding: 0;">
    <div class="row justify-content-center ml-md-4 ml-lg-5 justify-content-center" style="width: 100%;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="container d-flex justify-content-center">
                        <img src="{{ asset('img/U-read-logo.png') }}" alt="U-READ Logo" class="logo-image">
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 pt-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                              <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                  <i class="bi bi-eye"></i>
                                </button>
                              </div>
                              @error('password')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                        </div>
                          

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 loginBtn">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3 mt-3 text-center">
                            <hr class="col-md-4">
                            <h6 class="col-md-2">Or</h6>
                            <hr class="col-md-4">
                            <div class="col-md-6 offset-md-3 d-flex justify-content-center"> <!-- Add the classes 'd-flex' and 'justify-content-center' here -->
                                <a href="{{ route('google-auth') }}" class="btn btn-danger align-items-center"><i class="bi bi-google me-2"></i>Continue with Google</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
