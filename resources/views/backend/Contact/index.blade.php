<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-4">Danh Sách Liên Hệ</h1>

    <!-- Bảng hiển thị danh sách liên hệ -->
    <table class="table-auto border-collapse border border-slate-400 w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tên</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Số Điện Thoại</th>
                <th class="border px-4 py-2">Tiêu Đề</th>
                <th class="border px-4 py-2">Nội Dung</th>
                <th class="border px-4 py-2">Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td class="border px-4 py-2">{{ $contact->id }}</td>
                    <td class="border px-4 py-2">{{ $contact->name }}</td>
                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                    <td class="border px-4 py-2">{{ $contact->phone }}</td>
                    <td class="border px-4 py-2">{{ $contact->title }}</td>
                    <td class="border px-4 py-2">{{ $contact->content }}</td>
                    <td class="border px-4 py-2">
                        {{ $contact->status == 1 ? 'Active' : 'Inactive' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="mt-4">
        {{ $contacts->links() }}
    </div>
</div>
