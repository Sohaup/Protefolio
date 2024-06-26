<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avatar extends Model
{
    use HasFactory;
    protected $table = "avatars";
    protected $fillables = ['path' , 'user_id'];
    public $timestamps = false;

    public function user() {
       return $this->belongsTo(User::class);
    }
}
