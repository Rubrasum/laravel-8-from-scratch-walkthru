@extends('components.layout')

@section('content')

    <x-panel class="max-w-sm mx-auto">
        <section class="px-6 py-8">
            <form method="POST" action="/admin/posts">
                @csrf

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="title"
                    >
                        Title
                    </label>

                    <input  class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            required
                    >

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="slug"
                    >
                        Slug
                    </label>

                    <input  class="border border-gray-400 p-2 w-full"
                            name="slug"
                            id="slug"
                            type="text"
                            value="{{ old('slug') }}"
                            required
                    />

                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="excerpt"
                    >
                        Excerpt
                    </label>

                    <textarea  class="border border-gray-400 p-2 w-full"
                         name="excerpt"
                           id="excerpt"
                           required
                    >{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="body"
                    >
                        Body
                    </label>

                    <textarea  class="border border-gray-400 p-2 w-full"
                               name="body"
                               id="body"
                    >{{ old('body') }}</textarea>

                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="category_id"
                    >
                        Category
                    </label>

                    <select name="category_id" id="category_id" required>

                        @foreach (\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('excerpt') === $category->id ? 'selected' : '' }}
                            >{{ $category->name }}</option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button>Submit</x-submit-button>

            </form>



        </section>
    </x-panel>

@endsection