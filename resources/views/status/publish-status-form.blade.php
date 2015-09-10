<div class="status-post>">
    {!! Form::open(array('url' => 'status', 'files' => true)) !!}
    <div class="form-group">
        {!! Form::file('image_path', array('multiple' => 1, 'class' => 'btn btn-success', 'id' => 'imgInp') ) !!}
        {!! $errors->first('image_path','<span class="error">:message</span>') !!}

    </div>
    <div class="form-group">
        {!!Form::textArea('body',old('status'),array('class' => 'form-control','rows' =>3, 'placeholder' => trans('messages.postStatus_placeholder')))!!}
        {!! $errors->first('body','<span class="error">:message</span>') !!}
    </div>

    <div class="form-group">
        <img id="blah" src="#" WIDTH=100 HEIGHT=100 alt=""/>
    </div>

    <div class="form-group status-post-submit">
        <button type="submit" class="btn btn-primary">Post status</button>
    </div>


    {!!Form::close()!!}
</div>





