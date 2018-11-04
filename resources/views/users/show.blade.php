@extends('layouts.app')

@section('content')

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

    <div class="menu nav-images">
        <ul class="nav nav-tabs">
        	<li role="presentation" class="active"><a href="{{ route('users.show', ['id' => $user->id]) }}">投稿一覧</a></li>
        	<li role="presentation" ><a href="{{ route('favorite.index', ['id' => $user->id]) }}">お気に入り</a></li>
        	<li role="presentation" ><a href="{{ route('user.followings', ['id' => $user->id]) }}">フォロー</a></li>
        	<li role="presentation" ><a href="{{ route('user.followers', ['id' => $user->id]) }}">フォロワー</a></li>
        </ul>  
    </div>

@include('posts.images')

@endsection