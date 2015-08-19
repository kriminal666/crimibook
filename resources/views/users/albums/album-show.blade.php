@extends('master')

@section('content')
    <h1>Show album</h1>
    {{$album->name}}

    @if($album->owner == $currentUser)
        @include('users.albums.partials.album-share')
    @endif
@stop