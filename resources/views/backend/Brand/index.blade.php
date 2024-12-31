<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-4">Brand List</h1>
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
            @foreach ($brands as $brand)
                <tr>
                    <td class="border border-slate-300 px-4 py-2 text-center">{{ $brand->id }}</td>
                    <td class="border border-slate-300 px-4 py-2">{{ $brand->name }}</td>
                    <td class="border border-slate-300 px-4 py-2">{{ $brand->slug }}</td>
                    <td class="border border-slate-300 px-4 py-2 text-center">
                        <img src="{{ asset('uploads/brands/' . $brand->image) }}" alt="{{ $brand->name }}"
                            class="w-20 h-20 object-cover rounded">
                    </td>
                    <td class="border border-slate-300 px-4 py-2 text-center">
                        @if ($brand->status)
                            <span class="text-green-500 font-semibold">Active</span>
                        @else
                            <span class="text-red-500 font-semibold">Inactive</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $brands->links('pagination::bootstrap-4') }}
    </div>
</div>
