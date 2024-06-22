<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Last_Replay_Comment_React extends Model
{
    use HasFactory;
    protected $fllables = ['value' , 'user_id' , 'post_id' , 'comment_id','replay_comment_id','last_replay_comment_id'];
    protected $table = "lastreplaycommentreacts";
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
    public function replay_comment() {
        return $this->belongsTo(ReplayComments::class);
    }
    public function last_replay_comment() {
        return $this->belongsTo(Last_Replay_Comment::class);
    }
}
