@extends('layouts.app')

@section('content')

<?php $user = $post->user; ?>
<ul class="media-list">
    <li class="media">
        <div class="media-left">
            <img src="{{ Gravatar::src($user->email, 50) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="media-body">
            <div>
                {{ $user->name }}
            </div>
        <div class="media-body">
            <div>
                <p>{!! link_to_route('users.show', 'プロフィール', ['id' => $user->id]) !!}</p>
            </div>
        </div>
    </li>
</ul>
@include('user_follow.follow_button')

    <div class ="showcontent">
        <img src="{{ Storage::disk('s3')->url($post->image_path) }}" class="img-responsive">
        <p>{{ $post->content}}</p>
    </div>
　　
　　<!-- <a href="{{ route('posts.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-open" aria-hidden="true">お気に入り登録</span></a></li>-->
　　<div>
    　　@if (Auth::id() == $post->user_id)
    　　    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
    　　        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    　　    {!! Form::close() !!}
    　　@endif
　　</div>

@endsection