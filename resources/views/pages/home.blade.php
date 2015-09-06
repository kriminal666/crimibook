@extends('master')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Crimibook</h1>

        <h1>{{trans('messages.title')}}</h1>

        <p>
            {{trans('messages.welcome')}}
        </p>
        <a href="{{url('auth/login')}}" class="btn btn-primary">{{trans('messages.logIn')}}</a>
        <a href="{{url('auth/register')}}" class="btn btn-primary">{{trans('messages.signUp')}}</a>
    </div>

@stop