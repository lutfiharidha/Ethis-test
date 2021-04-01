<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel News</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.uikit.min.css">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit-icons.min.js"></script>

</head>

<body>
    <nav class="uk-navbar-container" uk-navbar>

        <div class="uk-navbar-left uk-margin-left">
            <a class="uk-navbar-item uk-logo" href="#">Laravel News</a>
        </div>

        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav uk-margin-right">
                @if (Route::has('login'))
                @auth
                <li><a href="{{ url('/home') }}">Home</a></li>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>

                @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
                @endif
                @endauth
                @endif
            </ul>

        </div>

    </nav>
    <div class="uk-container uk-container-medium uk-padding">

        <div class="uk-child-width-1-3@m" uk-grid>
            @foreach($arrNews as $post)
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top crop1">
                        <img class="" src="{{ url('img/news', $post->image) }}" alt="" srcset="">
                    </div>
                    <div class="uk-card-body">
                        <h4 class="uk-card-title">{{ str_limit($post->title, $limit = 20, $end = '...')  }}</h4>
                        <p>{{ str_limit($post->description, $limit = 100, $end = '...')  }}</p>
                    </div>
                    <div class="uk-card-footer">
                        <sup>Written by {{ $post->news_has_user->name }} on
                            {{ $post->created_at->format('m F Y')}}</sup>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $arrNews->links() }}
        </div>
    </div>
</body>

</html>
