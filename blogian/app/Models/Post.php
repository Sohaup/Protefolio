<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillables = ['title','img','content','user_id'];

    protected $table = 'posts';
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function comment() {
        return $this->hasMany(Comment::class);
    }
    public function replaycomment() {
        return $this->hasMany(ReplayComments::class);
    }
    public function lastreplaycomment() {
        return $this->hasMany(Last_Replay_Comment::class);
    }
    public function postreact() {
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
