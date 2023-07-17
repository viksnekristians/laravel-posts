<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function liked(){
        return $this->belongsToMany(User::class , 'likes', 'post_id', 'user_id');
    }
}
