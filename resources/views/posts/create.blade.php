@extends('components.layout')

@section('content')

<section class="py-8 max-w-md mx-auto">
    <h1 class="text-lg font-bold mb-4">
        Publish new post
    </h1>


    <x-panel class="max-w-sm mx-auto">
        <section class="px-6 py-8">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.input name="excerpt" type="textarea"/>
                <x-form.input name="body" type="textarea"/>
                <x-form.input name="category_id" type="textarea" label="Category"/>

                <x-submit-button>Submit</x-submit-button>

            </form>



        </section>
    </x-panel>
</section>

@endsection
