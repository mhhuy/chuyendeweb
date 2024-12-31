<x-layout-admin>
    <x-slot:title>
        Banner
    </x-slot:title>


    <div class="container mx-auto my-5">
        <h1 class="text-2xl font-bold mb-4">Banner List</h1>

        <!-- Table hiển thị danh sách banners -->
        <table class="table-auto border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 px-4 py-2">ID</th>
                    <th class="border border-slate-300 px-4 py-2">Name</th>
                    <th class="border border-slate-300 px-4 py-2">Link</th>
                    <th class="border border-slate-300 px-4 py-2">Image</th>
                    <th class="border border-slate-300 px-4 py-2">Position</th>
                    <th class="border border-slate-300 px-4 py-2">Status</th>
                    <th class="border border-slate-300 px-4 py-2">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td class="border border-slate-300 px-4 py-2 text-center">{{ $banner->id }}</td>
                        <td class="border border-slate-300 px-4 py-2">{{ $banner->name }}</td>
                        <td class="border border-slate-300 px-4 py-2">
                            <a href="{{ $banner->link }}" class="text-blue-500 hover:underline" target="_blank">
                                {{ $banner->link }}
                            </a>
                        </td>
                        <td class="border border-slate-300 px-4 py-2">
                            <img src="{{ asset('uploads/banners/' . $banner->image) }}" alt="{{ $banner->name }}"
                                class="w-20 h-20 object-cover rounded">
                        </td>
                        <td class="border border-slate-300 px-4 py-2 text-center">{{ $banner->position }}</td>
                        <td class="border border-slate-300 px-4 py-2 text-center">
                            @if ($banner->status)
                                <span class="text-green-500 font-semibold">Active</span>
                            @else
                                <span class="text-red-500 font-semibold">Inactive</span>
                            @endif
                        </td>
                        <td class="flex justify-center mt-1">
                            @if ($banner->status == 1)
                                <a href="" class="bg-green-600 py-1 px-1.5 text-white mx-0.5">
                                    <i class="fa-solid fa-toggle-on"></i>
                                </a>
                            @else
                                <a href="" class="bg-red-600 py-1 px-1.5 text-white mx-0.5">
                                    <i class="fa-solid fa-toggle-off"></i>
                                </a>
                            @endif
<a href="" class="bg-green-600 py-1 px-1.5 text-white mx-0.5">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="" class="bg-green-600 py-1 px-1.5 text-white mx-0.5 text-center">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <a href="" class="bg-red-600 py-1 px-1.5 text-white mx-0.5">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="mt-5">
            {{ $banners->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-layout-admin>