@auth
    <form action="/post/{{ $post->slug }}/comment" method="POST" class="border border-gray-200 p-6 rounded-xl">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/40?u={{ auth()->user()->id  }}" width="40" height="40" alt="" class="rounded-full">
            <h2 class="ml-4">Want to participate?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" required id="body" placeholder="Quick, thing of somethings to say !" class="w-full text-sm focus:outline-none focus:ring"  cols="30" rows="5"></textarea>
            @error('body')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
{{--        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">--}}
{{--            <button type="submit" class="bg-blue-500 px-4 py-2 text-white px-10 font-semibold uppercase rounded-2xl hover:bg-blue-600">Post</button>--}}
{{--        </div>--}}
        <x-submit-button>Post</x-submit-button>
    </form>
@else
    <p class="font-semibold mt-10">
        <a href="/register" class="hover:underline hover:text-blue-600 text-blue-500">Register</a> or <a href="/login" class="hover:underline hover:text-blue-600 text-blue-500">Login</a> to leave a comment.
    </p>
@endauth
