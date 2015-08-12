
@if($user->isFollowedBy(Auth::User()))

    <p>You are following {{$user->name}}</p>

@elseif($user->is(Auth::User()))



@else

    {!! Form::open(array('url' =>'follows')) !!}

        <div class="form-group">

            {!! Form::hidden('userToFollow', $user->id) !!}

        </div>

        <div class="form-group">

        <button type="submit"  class="btn btn-primary">Follow {{$user->name}}</button>

        </div>


    {!! Form::close() !!}

@endif