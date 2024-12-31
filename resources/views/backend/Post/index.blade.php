<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-4">Danh Sách Bài Viết</h1>

    <table class="table-auto border-collapse border border-slate-400 w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tiêu Đề</th>
                <th class="border px-4 py-2">Slug</th>
                <th class="border px-4 py-2">Mô Tả</th>
                <th class="border px-4 py-2">Chủ Đề</th>
                <th class="border px-4 py-2">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="border px-4 py-2">{{ $post->id }}</td>
                    <td class="border px-4 py-2">{{ $post->title }}</td>
                    <td class="border px-4 py-2">{{ $post->slug }}</td>
                    <td class="border px-4 py-2">{{ $post->description }}</td>
                    <td class="border px-4 py-2">{{ $post->topic->name ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">
                        <!-- Add action buttons like edit, delete if needed -->
                        <a href="{{ route('post.edit', $post->id) }}" class="text-blue-500">Sửa</a>
                        <a href="{{ route('post.delete', $post->id) }}" class="text-red-500">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>