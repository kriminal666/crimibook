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
        @if($user->is(Auth::User()))
            <a href="#"  class="btn btn-danger pull-right">X</a>
        @endIf
    </div>
</article>