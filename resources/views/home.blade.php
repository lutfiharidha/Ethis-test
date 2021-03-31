@extends('layouts.appAuth')

@section('content')
<h4 class="uk-text-center">Your Latest News</h1>
    <div class="uk-child-width-1-3@s" uk-grid>
        @foreach($posts as $post)
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top crop1">
                    <img class="" src="{{ url('img/news', $post->image) }}" alt="" srcset="">
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
