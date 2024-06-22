<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillables = ['content','user_id','post_id'];
    protected  $table = 'comments';
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function replay_comment() {
        return $this->hasMany(ReplayComments::class);
    }
    public function last_replay_comment() {
        return $this->hasMany(Last_Replay_Comment::class);
    }
    public function replay_comment_react() {
        return $this->hasMany(Replay_Comment_React::class);
    }
   public function last_replay_comment_react() {
        return $this->hasMany(Replay_Comment_React::class);
   }
}
