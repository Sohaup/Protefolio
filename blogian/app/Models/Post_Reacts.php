<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Reacts extends Model
{
    use HasFactory;
    protected $fillables = ['type' , 'value' , 'user_id' , 'post_id'];
    protected $table = "postreacts";
    public $timestamps  = false;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
