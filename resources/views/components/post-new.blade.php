@if ($posts->isNotEmpty())
    <div class="container mx-auto bg-gray-100 rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Latest Posts</h2>
        <div class="space-y-4">
            @foreach ($posts as $post)
                <div class="border-b pb-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ $post->description }}</p>
                    <a href="" class="text-blue-500 hover:underline">
                        Read more
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-gray-500">No recent posts available.</p>
@endif
