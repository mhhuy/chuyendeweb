<x-layout-site>
    <x-slot:title>
        Sản phẩm
    </x-slot:title>
    <x-slot:header> 

    </x-slot:header>
    <div class="bg-gray-50">

        <div class="container mx-auto flex mt-10">
        
            <!-- Left Sidebar (1/4) -->
            <div class="w-full sm:w-1/4 bg-white shadow-xl rounded-lg p-6 transform ">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">Brand</h2>
                <ul>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300 transform hover:translate-x-1">Brand 1</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300 transform hover:translate-x-1">Brand 2</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300 transform hover:translate-x-1">Brand 3</a></li>
                </ul>
        
                <h2 class="text-2xl font-semibold mt-8 mb-6 text-gray-800">Categories</h2>
                <ul>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300 transform hover:translate-x-1">Category 1</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300 transform hover:translate-x-1">Category 2</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300 transform hover:translate-x-1">Category 3</a></li>
                </ul>
            </div>
        
            <!-- Right Section (3/4) -->
            <div class="w-full sm:w-3/4 pl-6">
                <!-- Filters and Sorting -->
                <div class="flex justify-between items-center mb-3 mt-3">
                    <div class="flex items-center space-x-4">
                        <!-- Popularity Sort Icon (Star for Popularity) -->
                        <button class="text-gray-700 hover:text-blue-600 transition duration-300 transform hover:scale-105" aria-label="Sort by Popularity">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.27l4.18 2.18-1.64-5.14 4.18-3.18h-5.18L12 4.6l-2.72 6.73H4.1l4.18 3.18-1.64 5.14L12 17.27z"/>
                            </svg>
                        </button>
                        
                        <!-- Price: Low to High Icon (Upward Arrow for Low to High) -->
                        <button class="text-gray-700 hover:text-blue-600 transition duration-300 transform hover:scale-105" aria-label="Sort by Price: Low to High">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    
                        <!-- Price: High to Low Icon (Downward Arrow for High to Low) -->
                        <button class="text-gray-700 hover:text-blue-600 transition duration-300 transform hover:scale-105" aria-label="Sort by Price: High to Low">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m8 8H4"/>
                            </svg>
                        </button>
                    </div>
                    
    
                    <div class="flex items-center space-x-4">
                        <!-- List View Icon -->
                        <button class="text-gray-700 hover:text-blue-600 transition duration-300 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 4.5h15m-15 5h15m-15 5h15m-15 5h15" />
                            </svg>
                        </button>
                        
                        <!-- Grid View Icon -->
                        <button class="text-gray-700 hover:text-blue-600 transition duration-300 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h5v5H4zM10 4h5v5h-5zM16 4h5v5h-5zM4 10h5v5H4zM10 10h5v5h-5zM16 10h5v5h-5zM4 16h5v5H4zM10 16h5v5h-5zM16 16h5v5h-5z" />
                            </svg>
                        </button>
                    </div>
                </div>
        
                <!-- Product Display -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Product Cards Here -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                            <div class="absolute inset-0 bg-black opacity-40"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="{{url('./san-pham/2')}}" class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</a>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mt-4">Product Name</h3>
                        <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-gray-900 font-bold text-lg">$29.99</span>
                            <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Add to Cart</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                            <div class="absolute inset-0 bg-black opacity-40"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mt-4">Product Name</h3>
                        <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-gray-900 font-bold text-lg">$29.99</span>
                            <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Add to Cart</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                            <div class="absolute inset-0 bg-black opacity-40"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="{{url('./san-pham/2')}}" class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</a>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mt-4">Product Name</h3>
                        <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-gray-900 font-bold text-lg">$29.99</span>
                            <a href="{{url('./san-pham/2')}}" class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</a>
                        </div>
                    </div>
                    <!-- Repeat the product cards as needed -->
                </div>
    
                <!-- Pagination -->
                <nav class="mt-5 mb-4 flex justify-center space-x-4" aria-label="Pagination">
                    <span class="rounded-lg border border-teal-500 px-2 py-2 text-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="rounded-lg border border-teal-500 bg-teal-500 px-4 py-2 text-white">1</span>
                    <a class="rounded-lg border border-teal-500 px-4 py-2 text-gray-700" href="/page/2">2</a>
                    <a class="rounded-lg border border-teal-500 px-4 py-2 text-gray-700" href="/page/3">3</a>
                    <a class="rounded-lg border border-teal-500 px-2 py-2 text-gray-700" href="/page/2">
                        <span class="sr-only">Next</span>
                        <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </nav>
            </div>
        
        </div>
        
    </div>
    <x-slot:footer>

    </x-slot:footer>
</x-layout-site>