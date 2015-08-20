@extends('master')

@section('content')
    <div class="row">
    <h1>Show album</h1>
    {{$album->name}}

    @if($album->owner == $currentUser)
        @include('users.albums.partials.album-share')
    @endif

    </div>

@endsection


@section('specific_scripts')

    <script type="text/javascript" src="/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#share-album-multiselect').multiselect();
        });
    </script>

@stop