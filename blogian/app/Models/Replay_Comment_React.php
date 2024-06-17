<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replay_Comment_React extends Model
{
    use HasFactory;
    protected $fillables = ['value' , 'user_id' , 'post_id' , 'comment_id' , 'replay_comment_id'];
    protected $table = "replay_comment_reacts";
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
}
