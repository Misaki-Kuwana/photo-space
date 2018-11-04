@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-8 col-lg-6">
        <div class="pagetop">
        <h1>写真を投稿する</h1>
        </div>

        {!! Form::open(['route' => 'posts.store', 'class' => 'form', 'files' => true]) !!}
    
            <div class="form-group">
                {!! Form::label('file', '写真を選択') !!}
                {!! Form::file('file', null, ['class' => 'form-control']) !!}
            </div>
     
            <div class="form-group">
                {!! Form::label('content', '説明文') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>       
       
            <div class="form-group">
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
            </div>  
        
        {!! Form::close() !!}
    </div>
</div>

@endsection