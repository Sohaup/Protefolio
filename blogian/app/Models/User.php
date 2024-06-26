<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function avatar() {
       return  $this->hasOne(avatar::class);
    }
    public function post() {
        return $this->hasMany(Post::class);
    }
    public function comment() {
        return $this->hasMany(Comment::class);
    }
    public function replaycomment() {
        return $this->hasMany(ReplayComments::class);
    }
    public function lastreplaycomment() {
        return $this->hasMany(ReplayComments::class);
    }
    public function post_react() {
        return $this->hasMany(Post_Reacts::class);
    }
    public function comment_react() {
        return $this->hasMany(Comment_React::class);
    }
    public function replay_comment_react() {
        return $this->hasMany(Replay_Comment_React::class);
    }
    public function last_replay_comment_react() {
        return $this->hasMany(Last_Replay_Comment_React::class);
    }
}
