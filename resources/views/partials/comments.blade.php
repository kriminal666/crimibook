<article class="comments__comment media status-media">

    <div class="pull-left">
        @include('partials.avatar',  ['user' => $comment->owner])
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ $comment->owner->name }}</h4>

        <p class="text-muted since">{{$comment->present()->timeSincePublished}}</p>


        {{ $comment->body }}


        @if($comment->owner->is($currentUser))

            <div class="comment_delete pull-right">

                {!! Form::open(array('route' => ['comment_delete', $comment->id], 'method' => 'delete', 'class' =>
                'comments__delete-form'))!!}

                {!! Form::submit('X') !!}

                {!! Form::close() !!}

            </div>
        @endif


    </div>
</article>