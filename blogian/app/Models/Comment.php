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
    public function replaycomment() {
        return $this->hasMany(ReplayComments::class);
    }
    public function lastreplaycomment() {
        return $this->hasMany(Last_Replay_Comment::class);
    }
    public function replaycommentreact() {
        return $this->hasMany(Replay_Comment_React::class);
    }
}
