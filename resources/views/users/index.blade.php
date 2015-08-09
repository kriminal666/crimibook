@extends('master')

@section('content')

        <h1>All Users</h1>
        @foreach($users as $user)

            <div class="col-md-3 user-block">
                @include('partials.avatar')

                <h4 class ="user-block-username">{{$user->name}}</h4>

            </div>

        @endforeach



@stop