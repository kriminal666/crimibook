@extends('master')


@section('content')
  <h1>Post status</h1>
  <div class="row">
      <div class="col-md-6">

  {!! Form::open(array('url' => 'status')) !!}
          <div class="form-group">
              {!! Form::label('body', 'Status:', array('class' => 'awesome')); !!}
              {!!Form::textArea('body',old('status'),array('class' => 'form-control','rows' =>10))!!}
              {!! $errors->first('body','<span class="error">:message</span>') !!}
          </div>
          <div class="form-group">
              {!!Form::hidden('user_id',Auth::user()->id)!!}
          </div>

          <div class="form-group">
              <button type="submit"  class="btn btn-primary">Post status</button>
          </div>


          {!!Form::close()!!}
    </div>
  </div>


@stop