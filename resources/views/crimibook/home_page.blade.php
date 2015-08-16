@extends('master')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('status.publish-status-form')
            @if(isset($statuses))

                @foreach($statuses as $status)


                    @include('partials.status')

                @endforeach
            @endif

        </div>
    </div>



@stop