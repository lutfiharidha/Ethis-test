@extends('layouts.appAuth')

@section('content')
<h4 class="uk-text-center">News</h1>
<table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($arrNews as $key => $news)
            <tr>
                <td>{{ ++$key }}</td>
                <td class="crop"><img class="" src="{{ url('img/news', $news->image) }}" alt="" srcset=""></td>
                <td>{{ $news->title }}</td>
                <td class="uk-width-medium">{{ str_limit($news->description, $limit = 150, $end = '...')  }}</td>
                <td class="uk-width-small">{{ $news->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('news.edit', $news) }}" class="uk-button uk-button-small uk-button-text uk-text-primary uk-margin-small-right">Edit</a>
                    <form class="uk-button uk-button-text " action="{{ route('news.delete', $news) }}" method="post">
                    @csrf
                        {{ method_field('DELETE') }}
                        <input class="uk-button uk-button-text uk-text-danger show_confirm" type="submit" value="DELETE">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$('.show_confirm').click(function(e) {
    if(!confirm('Are you sure you want to delete this?')) {
        e.preventDefault();
    }
});
</script>
@endsection