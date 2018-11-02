@extends('layouts.app')

@section('content')

<h1>写真投稿</h1>

<div class="row">
    <div class="col-xs-6">

        {!! Form::open(['route' => 'posts.store', 'class' => 'form', 'files' => true]) !!}
    
            <div class="form-group">
                {!! Form::label('file', '写真を選択') !!}
                {!! Form::file('file', null, ['class' => 'form-control']) !!}
            </div>
     
            <div class="form-group">
                {!! Form::label('content', 'メッセージを入力') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>       
       
            <div class="form-group">
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
            </div>  
        
        {!! Form::close() !!}
    </div>
</div>

@endsection