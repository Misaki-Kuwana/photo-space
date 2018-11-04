@if (Auth::user()->is_favoriting($post->id))
    {!! Form::open(['route' => ['favorite.destroy', $post->id], 'method' => 'delete', 'class' => 'button']) !!}
        {!! Form::submit('お気に入り解除', ['class' => "btn btn-warning"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorite.store', $post->id], 'class' => 'button']) !!}
        {!! Form::submit('お気に入り登録', ['class' => "btn btn-success"]) !!}
    {!! Form::close() !!}        
@endif