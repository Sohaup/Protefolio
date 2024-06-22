<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Last_Replay_Comment extends Model
{
    
    use HasFactory;
    protected $fillables = ['content','user_id','post_id','comment_id','replay_comment_id','replay_user_id'];
    protected $table = 'last_replay_comments';
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function comment() {
        return $this->belongsTo(Comment::class);
    }
    public function replaycomment() {
        return $this->belongsTo(ReplayComments::class);
    }
    public function last_replay_comment_react() {
        return $this->hasMany(Last_Replay_Comment_React::class);
    }
}
