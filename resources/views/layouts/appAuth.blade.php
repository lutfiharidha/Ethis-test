<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel News</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.uikit.min.css">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit-icons.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.uikit.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <nav class="uk-navbar-container" uk-navbar>

        <div class="uk-navbar-left uk-margin-left">
            <a class="uk-navbar-item uk-logo" href="#">Laravel News</a>
        </div>

        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav uk-margin-right">
            <li id="notification">
                <a href="#">
                <span class="@if(count(auth()->user()->unreadNotifications) > 0) uk-badge @endif" uk-icon="icon:bell">
                </a>
                <div uk-dropdown="mode: click">
                    <ul id="show" class="uk-nav uk-navbar-dropdown-nav">
                        @foreach(auth()->user()->unreadNotifications as $notif)
                            <li class="notif">
                                <a class="mark-as-read" href="#" data-id="{{ $notif->id }}">
                                    <b>{{ $notif->data['author'] }}</b> was just created news about <b>{{ str_limit($notif->data['news'], $limit = 15, $end = '...')  }}</b><br>
                                {{ Carbon\Carbon::parse($notif->created_at)->diffForHumans()}}
                                <hr>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
                <li>
                    <a href="#">News</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="#">News</a></li>
                            <li><a href="#">Add News</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Profile</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </ul>

        </div>

    </nav>
    <div class="uk-container uk-padding-small uk-container-medium">
        @yield('content')
    </div>
    @yield('script')
    <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('notif.read') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('li.notif').remove();
            });
        });
    });
    </script>
</body>
</html>
