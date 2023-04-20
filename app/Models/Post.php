<?php


namespace App\Models;
use Illuminate\Support\Facades\File; // Class that gives you static access to functionality

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    /**
     * Post constructor.
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() {
        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))// parse the files in an object using yamlfrontmatter
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ));// create a post form the resulting parsed document
    }

    public static function find($slug) {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    }
}
