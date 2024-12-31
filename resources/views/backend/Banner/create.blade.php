<x-layout-admin>
    <x-slot:title>
        Thêm banner
    </x-slot:title>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold mb-4">Nhập Thông Tin Banner</h2>
        <form action="{{route('admin.banner.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tên Banner</label>
            <input
              type="text"
              id="name"
              name="name"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="Nhập tên banner"
              required
            />
          </div>

          <!-- Link -->
          <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-gray-700">Liên Kết</label>
            <input
              type="url"
              id="link"
              name="link"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="https://example.com"
            />
          </div>

          <!-- Image -->
          <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Hình Ảnh</label>
            <input
              type="file"
              id="image"
              name="image"
              class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
              accept="image/*"
              required
            />
          </div>

          <!-- Position -->
          <div class="mb-4">
            <label for="position" class="block text-sm font-medium text-gray-700">Vị Trí</label>
            <input
              type="text"
              id="position"
              name="position"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="Nhập vị trí"
            />
          </div>

          <!-- Description -->
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Mô Tả</label>
            <textarea
              id="description"
              name="description"
              rows="4"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="Nhập mô tả"
            ></textarea>
          </div>

          <!-- Sort Order -->
          <div class="mb-4">
            <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ Tự</label>
<input
              type="number"
              id="sort_order"
              name="sort_order"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="Nhập thứ tự"
              required
            />
          </div>

          <!-- Status -->
          <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Trạng Thái</label>
            <select
              id="status"
              name="status"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              required
            >
              <option value="1">Hoạt Động</option>
              <option value="0">Không Hoạt Động</option>
            </select>
          </div>

          <!-- Submit Button -->
          <div class="text-right">
            <button
              type="submit"
              class="px-4 py-2 bg-blue-500 text-white font-medium rounded-md shadow-sm hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
              Lưu Banner
            </button>
          </div>
        </form>
      </div>
</x-layout-admin>