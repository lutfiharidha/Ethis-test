@extends('layouts.app')

@section('content')
<div class="uk-position-center">
    <div class="uk-light uk-background-secondary uk-padding">
    <h3 class="uk-text-center">Register</h3>
    <form class="uk-form-stacked" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Name</label>
            <div class="uk-form-controls">
                <input class="uk-input uk-form-width-large @error('name') uk-form-danger @enderror" id="form-horizontal-text" type="text" name="name" placeholder="eg: John Doe" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Email</label>
            <div class="uk-form-controls">
                <input class="uk-input uk-form-width-large @error('email') uk-form-danger @enderror" id="form-horizontal-text" type="email" name="email" placeholder="eg: john@mail.com" value="{{ old('email') }}" required autocomplete="email">
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Password</label>
            <div class="uk-form-controls">
                <input class="uk-input uk-form-width-large @error('password') uk-form-danger @enderror" id="form-horizontal-text" type="password" name="password" required>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Confirm Password</label>
            <div class="uk-form-controls">
                <input class="uk-input uk-form-width-large" id="form-horizontal-text" type="password" name="password_confirmation" required>
            </div>
        </div>
        <button type="submit" class="uk-width-expand uk-button uk-button-default">
                {{ __('Register') }}
            </button>
        </form>
        <div class="uk-margin-top uk-text-center">
            <a class="uk-button uk-button-text" href="{{ route('login') }}">Login now</a>
        </div>
    </div>
</div>
@endsection
