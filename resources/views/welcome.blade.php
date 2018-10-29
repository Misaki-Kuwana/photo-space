@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
    	<h1>photospaceへようこそ</h1>
    	<p><a class="btn btn-primary btn-lg" href="{{ route('signup.get') }}" role="button">新規登録はこちら</a></p>
    </div>
@endsection