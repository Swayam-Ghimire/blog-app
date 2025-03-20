<x-layout>
    @if($posts->isEmpty())
        <p class="text-blue-500 text-center">No post Available </p>
    @else
        <ul>
            @foreach ($posts as $post)
                <li>
                    @if(Auth::check() && Auth::id() === $post->user_id)
                        <x-card href="{{ route('users.profile') }}" :post="$post" />
                    @else
                        <x-card href="{{ route('users.public-profile', $post->user_id) }}" :post="$post" />
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
    <div class="flex justify-center mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>