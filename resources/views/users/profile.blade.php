@extends('master')

@section('content')




        <div class="row">

                <div class="col-md-3 ">

                    <h1>{{$user->name}}</h1>
                    @include('partials.avatar',['size' => 70])


                    @include('partials.follow-form')

                </div>
                <div class="col-md-6">
                    @if($user->is(Auth::User()))
                        @include('status.publish-status-form')
                    @endif
                    @if($user->statuses->count())
                        @foreach($user->statuses->sortByDesc('created_at') as $status)

                            @include('partials.status')

                        @endforeach
                    @else

                        <p>THIS USER HAS NOT POSTS</p>

                    @endif

                </div>

        </div>








@stop