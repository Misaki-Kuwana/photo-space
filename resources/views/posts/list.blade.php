@extends('layouts.app')

@section('content')
    <div class="menu">
        <ul class="nav nav-tabs">
        	<li role="presentation" ><a href="/">ホーム</a></li>
        	<li role="presentation" class="active"><a href="{{ route('posts.list') }}">新着</a></li>
        </ul>  
    </div>

@include('posts.images')

@endsection