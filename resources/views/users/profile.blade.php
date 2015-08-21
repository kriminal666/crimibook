@extends('master')

@section('content')

    <div class="row">

        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">

                    @include('partials.avatar',['size' => 70])

                </div>
                <div class="media-body">

                    <h1 class="media-heading">{{$user->name}}</h1>

                    <ul class="list-inline text-muted">

                        <li>{{ $user->present()->statusesCount}}</li>
                        <li>{{ $user->present()->followersCount}}</li>

                    </ul>

                    <p class="text-muted"></p>

                    @foreach($user->followers as $follower)

                        @include('partials.avatar',['size' => 30, 'user' => $follower])
                        <p class="text-muted">{{ $follower->name }}</p>

                    @endforeach

                    @unless($currentUser->sharedAlbumsWithMe($user)->isEmpty())

                        <h4>{{$user->name}}'s albums</h4>
                        <ul class="text-muted">
                            @foreach($currentUser->sharedAlbumsWithMe($user) as $album)
                                <li><a href="{{route('albums.show', $album->id)}}">{{$album->name}}</a></li>
                            @endforeach

                        </ul>

                    @endunless

                </div>
            </div>
        </div>
        <div class="col-md-6">

            @unless($user->is($currentUser))

                @include('partials.follow-form')

                @endif


                @if($user->is($currentUser))
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