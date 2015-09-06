@extends('master')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="row">
        @unless($currentUser->albums->isEmpty())
            @include('users.albums.partials.list-albums')
        @endunless
        @if($currentUser->albums->isEmpty())

              <div class="col-md-6 col-md-offset-3">
        @else
              <div class="col-md-6">
        @endif
            @include('status.publish-status-form')
            @if(isset($statuses))

                @foreach($statuses as $status)


                    @include('partials.status')

                @endforeach
            @endif

        </div>
    </div>
</div>


@stop