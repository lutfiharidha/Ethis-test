@extends('layouts.appAuth')

@section('content')
<h4 class="uk-text-center">Your Latest News</h1>
    <div class="uk-child-width-expand@s uk-text-center" uk-grid>
    @foreach($posts as $post)
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="https://getuikit.com/docs/images/light.jpg" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">{{ $post->title }}</h3>
                    <p>{{ str_limit($post->description, $limit = 150, $end = '...')  }}</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
