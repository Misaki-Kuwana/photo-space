@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('フォローをやめる', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $user->id], 'class' => 'follow-button']) !!}
            {!! Form::submit('フォローする', ['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}        
    @endif
@endif