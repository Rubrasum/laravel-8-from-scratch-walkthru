@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments" class="">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="50" class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                                    <textarea
                                        name="body"
                                        rows="5"
                                        class="w-full text-sm focus:outline-none focus:ring"
                                        placeholder="Quick think of something to say"
                                        required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <x-submit-button>Post</x-submit-button>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to leave a comment.
    </p>
@endauth
