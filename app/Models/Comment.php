<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post() { // post_id
        return $this->belongsTo(Post::class);
    }

    public function author() { // author_id - requires override
        // have to be specific because it's called author in table
        return $this->belongsTo(User::class, 'user_id');
    }
}
