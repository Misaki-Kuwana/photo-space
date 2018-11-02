@extends('layouts.app')

@section('content')
    <div class="menu">
        <ul class="nav nav-tabs">
        	<li role="presentation" ><a href="">ホーム</a></li>
        	<li role="presentation" class="active"><a href="{{ route('posts.list') }}">新着</a></li>
        </ul>  
    </div>
  
  
    @if (count($posts) > 0)
        <div class="row">
            @foreach ($posts as $post)
                
                    <div class="col-md-3 col-sm-5 col-xs-12">
                        <a href="{{ route('posts.show', ['id'=> $post->id]) }}"><img src="{{ Storage::disk('s3')->url($post->image_path) }}"　height="300" width="280" class="post"></a>
                    </div>
        
            @endforeach
        </div>
    @endif
    

@endsection