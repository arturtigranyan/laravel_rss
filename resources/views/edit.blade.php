@extends('layout')
@section('content')

<div class="container">
  <h2>Vertical (basic) form</h2>
  {{Form::model($model, array('url' => 'edit/'.$model->id, 'method' => 'post'))}}
    
    <div class="form-group">
        {{Form::label('id', 'Title')}}
        {{Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title'))}}
    </div>
    
    <div class="form-group">
        {{Form::label('id', 'Description')}}
        {{Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description'))}}
    </div>
    
    <div class="form-group">
        {{Html::image('images/'.$model->image_name, $model->image_name, [])}}        
    </div>
    
    
    <button type="submit" class="btn btn-default">Submit</button>
  {{Form::close()}}
</div>
@endsection