<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(5)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {

        request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::exists('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'user_id' => auth()->id()
        ]);

        $attributes['user_id'] =

        Post::create([

        ])

    }
}
