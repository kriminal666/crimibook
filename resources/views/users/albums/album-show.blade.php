@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <blockquote>
            <h1>Album {{$album->name}}</h1>
            {{$album->description}}
            </blockquote>
        </div>


        @if($album->owner == $currentUser && ! $currentUser->followers->isEmpty() && !($album->sharedWith->count() == $currentUser->followers->count()))
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