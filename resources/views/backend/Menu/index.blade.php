<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-4">Danh Sách Menu</h1>

    <table class="table-auto border-collapse border border-slate-400 w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tên</th>
                <th class="border px-4 py-2">Link</th>
                <th class="border px-4 py-2">Loại</th>
                <th class="border px-4 py-2">Vị Trí</th>
                <th class="border px-4 py-2">Thứ Tự</th>
                <th class="border px-4 py-2">Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td class="border px-4 py-2">{{ $menu->id }}</td>
                    <td class="border px-4 py-2">{{ $menu->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ $menu->link }}" class="text-blue-500 underline">{{ $menu->link }}</a>
                    </td>
                    <td class="border px-4 py-2">{{ $menu->type }}</td>
                    <td class="border px-4 py-2">{{ $menu->position }}</td>
                    <td class="border px-4 py-2">{{ $menu->sort_order }}</td>
                    <td class="border px-4 py-2">{{ $menu->status == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="mt-4">
        {{ $menus->links() }}
    </div>
</div>
