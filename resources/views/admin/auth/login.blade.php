@extends('layouts.app_admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="">
                @csrf
                <div class="d-block text-center">
                    <img class="mb-4" src="{{asset('images/bootstrap-logo.svg')}}" alt="" width="58" height="48">
                    <h5 class="mb-3 fw-normal">Please sign in Admin</h5>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required autocomplete="email">
                    <label for="email">Email address</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="checkbox d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div>
                <button type="submit" class="btn btn-lg btn-primary w-100"> {{ __('Login') }} </button>

                
            </form>
        </div>
    </div>


</div>
@endsection
@push('scripts')

@endpush