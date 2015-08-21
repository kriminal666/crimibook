
    <div class="col-md-3 pull-right">
        <h4>Share with friends:</h4>
        {!! Form::open(array('route' =>'albums_share')) !!}
        {!! Form::hidden('album_id', $album->id) !!}

                <div class="form-group">

                        <select id="share-album-multiselect" class="form-control" name="shareWith[]" multiple="multiple">

                            @foreach($currentUser->followers as $follower)
                                @if(! in_array($follower->id, $album->sharedWith()->lists('user_id')->all()))
                                    <option value="{{$follower->id}}">{{$follower->name}}</option>
                                @endif

                            @endforeach
                        </select>
                    {!! $errors->first('shareWith','<br /><span class="error">:message</span>') !!}

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Share</button>
                </div>

        {!!Form::close()!!}
    </div>
