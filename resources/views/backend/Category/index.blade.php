<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-4">Category List</h1>

    <!-- Table hiển thị danh sách Categories -->
    <table class="table-auto border-collapse border border-slate-400 w-full">
        <thead>
            <tr>
                <th class="border border-slate-300 px-4 py-2">ID</th>
                <th class="border border-slate-300 px-4 py-2">Name</th>
                <th class="border border-slate-300 px-4 py-2">Slug</th>
                <th class="border border-slate-300 px-4 py-2">Image</th>
                <th class="border border-slate-300 px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorys as $category)
                <tr>
                    <td class="border border-slate-300 px-4 py-2 text-center">{{ $category->id }}</td>
                    <td class="border border-slate-300 px-4 py-2">{{ $category->name }}</td>
                    <td class="border border-slate-300 px-4 py-2">{{ $category->slug }}</td>
                    <td class="border border-slate-300 px-4 py-2 text-center">
                        <img src="{{ asset('uploads/categories/' . $category->image) }}" alt="{{ $category->name }}"
                            class="w-20 h-20 object-cover rounded">
                    </td>
                    <td class="border border-slate-300 px-4 py-2 text-center">
                        @if ($category->status)
                            <span class="text-green-500 font-semibold">Active</span>
                        @else
                            <span class="text-red-500 font-semibold">Inactive</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="mt-5">
        {{ $categorys->links('pagination::bootstrap-4') }}
    </div>
</div>
