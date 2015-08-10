@extends('master')

@section('content')

        <h1>All Users</h1>


        @foreach($users->chunk(4) as $userSet)

            <div class="row users">

                @foreach($userSet as $user)

                    <div class="col-md-3 user-block">
                        <a href="{{route('profile_path',$user->name) }}">
                        @include('partials.avatar', ['size' => 70])
                        </a>

                        <h4 class ="user-block-username">
                            {!! link_to_route('profile_path',$title = $user->name, $parameters = array($user->name, $user->name)) !!}

                        </h4>

                    </div>

                @endforeach
        </div>
    @endforeach


    {!! $users->render() !!}




@stop