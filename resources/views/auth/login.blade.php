@extends('layouts.app')

@section('content')
<div class="uk-position-center">
    <div class="uk-light uk-background-secondary uk-padding">
    <h3 class="uk-text-center">Login</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input class="uk-input @error('email') uk-form-danger @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password" required autocomplete="current-password">        
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="uk-margin">
                <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember Me
            </div>
            <div class="uk-margin">
            <button type="submit" class="uk-width-expand uk-button uk-button-default">
                {{ __('Login') }}
            </button>
            </div>
        </form>
        Dont't have account? <a class="uk-button uk-button-text" href="{{ route('register') }}">Register now</a>
    </div>
</div>
@endsection
