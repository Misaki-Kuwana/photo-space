<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        $exist = $this->is_following($userId);
        
        $its_me = $this->id== $userId;
        
        if ($exist || $its_me) {
            return false;
        } else {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        
        $its_me = $this->id== $userId;
        
        if ($exist && !$its_me) {
            $this->followings()->detach($userId);
            return true;            
        } else {
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function feed_posts()
    {
        $follow_user_ids = $this->followings()-> pluck('users.id')->toArray();
        return Post::whereIn('user_id', $follow_user_ids);
    }
    
    public function favoritings()
    {
        return $this->belongsToMany(Post::class, 'user_post', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function favorite($postId)
    {
        $exist = $this->is_favoriting($postId);

        if ($exist) {
            return false;
        } else {
            $this->favoritings()->attach($postId);
            return true;
        }
    }
    
    public function unfavorite($postId)
    {
        $exist = $this->is_favoriting($postId);
        
        if ($exist) {
            $this->favoritings()->detach($postId);
            return true;            
        } else {
            return false;
        }
    }
    
    public function is_favoriting($postId)
    {
        return $this->favoritings()->where('post_id', $postId)->exists();
    }
}
