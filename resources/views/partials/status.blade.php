<article class="media status-media">
    <div class="pull-left">
        @include('partials.avatar', ['user' => $status->users])
    </div>
    <div class="media-body status-media-body">
        <h4 class="media-heading status-media-heading">{{$status->users->name}}</h4>

        <p class="text-muted status-media-time">{{$status->present()->timeSincePublished}}</p>

        @if($status->image_path)
            <img class="img" src="{{$status->image_path}} " width=200 height=200/>
            <hr>
        @endif

        {{$status->body}}

        @if($status->users->is($currentUser))

            <div class="comment_delete pull-right">

                {!! Form::open(array('route' => ['delete_status'], 'method' => 'get', 'class' =>
                'status__delete-form'))!!}
                {!! Form::hidden('status_id', $status->id) !!}
                {!! Form::token() !!}
                {!! Form::submit('X') !!}
                {!! Form::close() !!}

            </div>

        @endif
    </div>
</article>

@if ($status->users->isFollowedBy($currentUser) || $status->users->is($currentUser))

    {!! Form::open(array('route' => ['comment_path', $status->id], 'method' => 'post', 'class' => 'comments__create-form'))!!}

    {!! Form::hidden('status_id', $status->id) !!}

    <div class="form-group">
        {!!Form::textArea('body',null,array('class' => 'form-control','rows' =>1, 'placeholder' => 'Comment'))!!}
        {!! $errors->first('body','<span class="error">:message</span>') !!}
    </div>

    {!! Form::close() !!}

@endif

@unless($status->comments->isEmpty())

    <div class="comments">

        @foreach($status->comments as $comment)

            @include('partials.comments')

        @endforeach

    </div>



@endunless
