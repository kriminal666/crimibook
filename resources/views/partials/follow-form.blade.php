@if($user->isFollowedBy($currentUser))

    {!! Form::open(array('url' => ['follows', $user->id], 'method' => 'delete')) !!}

    <div class="form-group">

        {!! Form::hidden('userToFollow', $user->id) !!}

    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-danger">{{trans('messages.unfollow_blade')}} {{$user->name}}</button>

    </div>


    {!! Form::close() !!}

@else

    {!! Form::open(array('url' =>'follows')) !!}

    <div class="form-group">

        {!! Form::hidden('userToFollow', $user->id) !!}

    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-primary">{{trans('messages.follow_blade')}} {{$user->name}}</button>

    </div>


    {!! Form::close() !!}

@endif