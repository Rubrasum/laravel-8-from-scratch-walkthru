@extends('components.layout')

@section('content')
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>
        @else
            <p class="text-center">No posts yet! Try back later.</p>
        @endif
    </main>


{{--    @foreach ($posts as $post)--}}
{{--        <article>--}}
{{--            <h2>--}}
{{--                <a href="/posts/{{$post->slug}}">--}}
{{--                    {{ $post->title }}--}}
{{--                </a>--}}
{{--            </h2>--}}

{{--            <p>--}}
{{--                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>--}}
{{--            </p>--}}

{{--            <div>--}}
{{--                {{ $post->excerpt }}...--}}
{{--            </div>--}}
{{--        </article>--}}
{{--    @endforeach--}}
@endsection
