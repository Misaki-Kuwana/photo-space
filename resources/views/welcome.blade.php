@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="menu">
        <ul class="nav nav-tabs">
        	<li role="presentation" class="active" ><a href="/">ホーム</a></li>
        	<li role="presentation"><a href="{{ route('posts.list') }}">新着</a></li>
        </ul>  
    </div>

@include('posts.images')
    @else
        <div class="jumbotron text-center">
        	<h1>photospace</h1>
        	<p><a class="btn btn-primary btn-lg" href="{{ route('signup.get') }}" role="button">新規登録はこちら</a></p>
        </div>
    @endif
@endsection