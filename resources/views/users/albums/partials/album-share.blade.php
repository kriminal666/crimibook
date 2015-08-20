
    <div class="col-md-6 col-md-offset-9">
        {!! Form::open(array('route' =>'albums_share')) !!}

                <div class="form-group">

                        <select id="share-album-multiselect" class="form-control" name="shareWith[]" multiple="multiple">

                            @foreach($currentUser->followers as $follower)
                                <option value="{{$follower->id}}">{{$follower->name}}</option>

                            @endforeach
                        </select>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Share</button>
                </div>

        {!!Form::close()!!}
    </div>
