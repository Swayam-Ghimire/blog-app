<x-layout :title=$title>
    @if($posts->isEmpty())
        <p class="text-blue-500 text-center"> No posts available</p>
    @else
        <ul>
            @foreach ($posts as $post)
                <li>
                    <x-card href="{{ route('users.profile') }}" :post="$post" />
                </li>
            @endforeach
        </ul>
        <div class="flex justify-center mt-6">
            {{ $posts->links() }}
        </div>
    @endif
</x-layout>