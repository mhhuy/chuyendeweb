<div>
    product index
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>
<div>
    <h1>Product</h1>
    <table class="table-auto border-collapse border border-slate-400 w-full">
        <thead>
            <tr>
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Name</th>
                <th class="border border-slate-300">Category</th>
                <th class="border border-slate-300">Brand</th>
                <th class="border border-slate-300">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td class="border border-slate-300">{{ $item->id }}</td>
                    <td class="border border-slate-300">{{ $item->name }}</td>
                    <td class="border border-slate-300">{{ $item->category->name ?? 'N/A' }}</td>
                    <td class="border border-slate-300">{{ $item->brand->name ?? 'N/A' }}</td>
                    <td class="border border-slate-300">{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-3">
        {{ $products->links() }}
    </div>

</div>
