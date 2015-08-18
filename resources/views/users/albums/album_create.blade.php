@extends('master')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">


        <div class="album-post>">
            {!! Form::open(array('url' => 'albums')) !!}

            <div class="form-group">
                {!! Form::label('name', 'Album name') !!}<br/>
                {!! Form::text('name') !!}<br />
                {!! $errors->first('name','<span class="error">:message</span>') !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Album description');!!}
                {!!Form::textArea('description',old('description'),array('class' => 'form-control','rows' =>3, 'placeholder' => 'Album description'))!!}
                {!! $errors->first('description','<span class="error">:message</span>') !!}
            </div>

            <div class="form-group status-post-submit">
                <button type="submit" class="btn btn-primary">Create new album</button>
            </div>


            {!!Form::close()!!}
        </div>

    </div>
</div>

@stop
