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

    protected $with = ['category', 'author']; // prevents n+1 problem.

    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%'));
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }


}
