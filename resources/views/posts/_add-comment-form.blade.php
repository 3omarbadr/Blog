@auth
<form method="POST" action="/posts/{{$post->slug}}/comments" class="border border-gray-200 p-6 rounded-xl">
    @csrf

    <header class="flex text-center">
        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="48" height="48" class="rounded-full">

        <h2 class="ml-4">Want to participate ? </h2>
    </header>

    <div class="mt-6">
        <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
            placeholder="Quick, think of somthing to say!" required></textarea>

        @error('body')
        <span class="text-xs text-red-500">{{$message}}</span>
        @enderror
    </div>

    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
        <x-submit-button>Post</x-submit-button>
    </div>
</form>
@else
<p class="font-semibold">
    <a href="/register" class="hover:underline">Register</a> Or <a href="/login" class="hover:underline">Log in to
        comment</a>
</p>
@endauth