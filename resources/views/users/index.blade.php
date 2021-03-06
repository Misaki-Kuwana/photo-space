@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)    
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
@endforeach
</ul>
{!! $users->render() !!}
@endif