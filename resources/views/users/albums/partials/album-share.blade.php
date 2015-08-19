{!! Form::open(array('route' =>'albums_share')) !!}

    <select class="form-control" name="browsers" multiple>

        @foreach($currentUser->followers as $follower)
            <option value="{{$follower->id}}">{{$follower->name}}</option>

        @endforeach
    </select>

    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default">Share</button>
        </div>
    </div

 {!!Form::close()!!}