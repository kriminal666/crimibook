@extends('master')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
   <h1>Crimibook home page</h1>
    @if(isset($statuses))
        @foreach($statuses as $status)
            <ul>
                <li>{{$status->body}}</li>
            </ul>

        @endforeach
    @endif


@stop