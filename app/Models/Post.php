<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    protected $fillable = ['title', 'excerpt', 'body']; // allows only these explicit fields to be mass assigned
//    protected $guarded = ['id']; // disables these fields from being mass assigned
    protected $guarded = []; // allows all mass assigned but can be used to

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
