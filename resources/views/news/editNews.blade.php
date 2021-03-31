@extends('layouts.appAuth')

@section('content')
<h4 class="uk-text-center">Add News</h1>
@if($errors->any())
    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
            {{ implode('', $errors->all(':message')) }}
        
    </div>
@endif
<div class=" uk-light uk-background-secondary uk-padding">
<form method="POST" action="{{ route('news.update', $news) }}" class="uk-form-stacked uk-padding" enctype="multipart/form-data">
    @csrf
    <div class="uk-margin" uk-margin>
        <div class="crop"><img class="" src="{{ url('img/news', $news->image) }}" alt="" srcset=""></div>
        <div uk-form-custom="target: true">
            <input type="file" name="imageNews">
            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Title</label>
        <div class="uk-form-controls">
            <input class="uk-input" name="title" id="form-stacked-text" type="text" placeholder="News Title" required value="{{ $news->title }}">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Description</label>
        <div class="uk-form-controls">
            <textarea rows="10" name="description" class="uk-textarea" required>{{ $news->description }}</textarea>
        </div>
    </div>
    <div class="uk-margin">
        <button class="uk-button uk-button-primary uk-align-right" type="submit">Publish</button>
    </div>
</form>
</div>
@endsection
