@extends('master')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Crimibook</h1>

        <h1>Theme example</h1>

        <p>
            This is a template showcasing the optional theme stylesheet included in Bootstrap.
            Use it as a starting point to create something more unique by building on or modifying it.
        </p>
        <a href="{{url('auth/login')}}" class="btn btn-primary">Sign in</a>
        <a href="{{url('auth/register')}}" class="btn btn-primary">Sign up</a>
    </div>

@stop