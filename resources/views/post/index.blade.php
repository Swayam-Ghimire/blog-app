<x-layout>
    <ul>
        @foreach ($posts as $post)
            <li>
                <x-card :href="route('post.show', $post->id)" :post="$post" />
            </li>
        @endforeach
    </ul>
    <div class="flex justify-center mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>