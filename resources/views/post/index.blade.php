<x-layout>
    <ul>
        @foreach ($posts as $post)
            <li>
                <x-card :post="$post" />
            </li>
        @endforeach
    </ul>
    <div class="flex justify-center mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>