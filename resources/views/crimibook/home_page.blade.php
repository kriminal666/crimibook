@extends('master')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                @include('status.index')
                @if(isset($statuses))

                    @foreach($statuses as $status)

                        <article class="media status-media">
                            <div class="pull-left">
                                 @include('partials.avatar', ['user' => $status->users])
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$status->users->name}}</h4>
                                <p>{{$status->present()->timeSincePublished}}</p>

                                @if($status->image_path)
                                    <img class="img"  src="{{$status->image_path}} "  width = 200 height = 200/>
                                    <hr>
                                @endif

                                    {{$status->body}}

                            </div>


                        </article>

                    @endforeach
                @endif

        </div>
    </div>



@stop