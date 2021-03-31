@extends('layouts.app')

@section('content')
<div class="uk-position-center">
<div>
        <div class="uk-light uk-background-secondary uk-padding">
            <h3>Verify Your Email Address</h3>
            <p>Before proceeding, please check your email for a verification link.</p>
            <p>If you did not receive the email, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>
        </div>
    </div>
</div>
@endsection
