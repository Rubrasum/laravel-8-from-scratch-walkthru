@extends('components.layout')

@section('content')
    <article>
        <h1>
            <a href="/posts/{{$post->slug}}">
                {{$post->title}}
            </a>
        </h1>

        <p>
            <a href="#">{{ $post->category->name }}</a>
        </p>

        <div>
            {!! $post->body !!}...
        </div>
    </article>
    <a href="/">Go Back</a>
@endsection
