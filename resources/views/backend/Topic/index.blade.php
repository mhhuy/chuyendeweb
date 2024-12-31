<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-4">Topic List</h1>

    <table class="table-auto border-collapse border border-slate-400 w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Slug</th>
                <th class="border px-4 py-2">Sort Order</th>
                <th class="border px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topics as $topic)
                <tr>
                    <td class="border px-4 py-2">{{ $topic->id }}</td>
                    <td class="border px-4 py-2">{{ $topic->name }}</td>
                    <td class="border px-4 py-2">{{ $topic->slug }}</td>
                    <td class="border px-4 py-2">{{ $topic->sort_order }}</td>
                    <td class="border px-4 py-2">{{ $topic->status == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
