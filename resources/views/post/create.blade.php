<x-layout>
    <div class="mx-5 p-4">
        <h1 class="text-xl font-bold text-gray-800 mb-1.5">Create a Post</h1>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required value={{ old('title') }}>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
            </div>
            <div class="mb-10 mt-3">
                <label for="picture" class="picture">
                    <i class="fas fa-upload mr-2"></i> Upload Post Picture
                </label>
                <input type="file" id="picture" name="picture" class="hidden">
                <span id="file-name" class="ml-2 text-gray-600"></span>
            </div>
            <button type="submit" class="sub">Create Post</button>
        </form>
        <x-error/>
    </div>

    <div class="mt-4">
        @if($posts->count() > 0)
        <h2 class="text-lg font-semibold">Your Previous Posts</h2>
        <ul>
            @foreach ($posts as $post)
            <li>
                <x-card :post="$post" />
            </li>
            @endforeach
        </ul>
        @else
            <p class="text-gray-500">You haven't written any posts yet.</p>
        @endif
    </div>
</x-layout>