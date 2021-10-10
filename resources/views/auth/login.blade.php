@extends('layouts.app')

@section('content')
<style type="text/css">
 {
        color: #545454;
        background-color: #ffffff;
        box-shadow: 0 1px 2px 1px #ddd
    }

    .or-container {
        align-items: center;
        color: #ccc;
        display: flex;
        margin: 25px 0
    }

    .line-separator {
        background-color: #ccc;
        flex-grow: 5;
        height: 1px
    }

    .or-label {
        flex-grow: 1;
        margin: 0 15px;
        text-align: center
    }

</style>
<div class="container">
    <section class="vh-lg-50 mt-5 mt-lg-0 mb-5 bg-soft d-flex align-items-center">
        <div class="container">
            <p class="text-center">
                <a href="{{url('/')}}" class="d-flex align-items-center justify-content-center">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Back to homepage
                </a>
            </p>
            <div class="row justify-content-center">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <img class="mb-4" src="{{asset('/assets/volt/img/brand/light.png')}}" alt="" height="48">
                            <h1 class="mb-0 h3">Welcome back</h1>
                        </div>
                        <form method="POST" class="mt-4" action="{{ route('login') }}">
                            @csrf
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="email">Your Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                            </path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End of Form -->
                            <div class="form-group">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="password">Your Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" autocomplete="on" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="d-flex justify-content-between align-items-top mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label mb-0" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a class="small text-right" href="{{ route('password.request') }}">
                                                {{ __('Lost Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-secondary">Sign in</button>
                            </div>
                        </form>
                        <div class="or-container">
                            <div class="line-separator"></div>
                            <div class="or-label">or</div>
                            <div class="line-separator"></div>
                        </div>
                        <div class="row">
                            <div class="d-grid"><a class="btn btn-block btn-pill btn-outline-gray-500 " href="{{ url('auth/google') }}"><img width="18px" src="https://assets.gitlab-static.net/assets/auth_buttons/google_64-9ab7462cd2115e11f80171018d8c39bd493fc375e83202fbb6d37a487ad01908.png"> Login With Google </a></div>
                        </div> 
                       
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <span class="fw-normal">
                                Not registered?
                                <a class="fw-bold" href="{{ route('register') }}">{{ __('Create account') }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <p class="mb-3 text-muted text-center">{{ config('app.name', 'Laravel') }}© 2017–2021</p>
</div>
@endsection
@push('scripts')

@endpush