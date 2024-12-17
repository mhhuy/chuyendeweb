<x-layout-site>
    <x-slot:title>
        Liên hệ
    </x-slot:title>
    <x-slot:header>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </x-slot:header>
    <div class="container mx-auto bg-white rounded-lg shadow-lg p-8 grid grid-cols-12 gap-8">
        <!-- Left Side: Product Image (4/12) -->
        <div class="col-span-12 md:col-span-4 relative overflow-hidden">
            <img class="object-cover w-full h-full rounded-lg" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product Image">
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
    
        <!-- Right Side: Product Details (8/12) -->
        <div class="col-span-12 md:col-span-8">
            <!-- Product Name -->
            <h3 class="text-2xl font-bold text-gray-900 mt-4">Product Name</h3>
    
            <!-- Product Description -->
            <p class="text-gray-500 text-sm mt-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ante justo. Integer euismod libero id mauris malesuada tincidunt. Fusce auctor purus eu justo facilisis, vitae rutrum sapien scelerisque.
            </p>
    
            <!-- Price -->
            <div class="mt-4">
                <span class="text-gray-900 font-bold text-2xl">$29.99</span>
            </div>
    
            <!-- Quantity Selector with Increment/Decrement -->
            <div class="inline-flex items-center mt-2">
                <button
                    class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                </button>
                <div
                    class="bg-gray-100 border-t border-b border-gray-100 text-gray-600 hover:bg-gray-100 inline-flex items-center px-4 py-1 select-none">
                    1
                </div>
                <button
                    class="bg-white rounded-r border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>
    
            <!-- Add to Cart and Buy Now Buttons -->
            <div class="flex items-center space-x-4 mt-4">
                <!-- Add to Cart Button -->
                <button class="bg-gray-100 text-red-600 py-2 px-4 rounded-full font-bold hover:bg-red-600 hover:text-white   transition duration-300 w-full md:w-auto">
                    <i class="fa-sharp fa-solid fa-cart-plus"></i>
                </button>
                
                <!-- Buy Now Button -->
                <button class="bg-teal-500 text-white py-2 px-4 rounded-full font-bold hover:bg-teal-600 transition duration-300 w-full md:w-auto">
                    Buy Now
                </button>
            </div>
        </div>
    </div>
    <!-- Product Others -->
    <section class="py-10" id="services">
        <div class="bg-white py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-black mb-8">///</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                            <div class="absolute inset-0 bg-black opacity-40"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mt-4">Product Name</h3>
                        <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                            ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
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
                        <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                            ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
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
                        <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                            ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-gray-900 font-bold text-lg">$29.99</span>
                            <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Add to Cart</button>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </section>
    <x-slot:footer>
        <script>
            // Function to handle increment and decrement of quantity
            function changeQuantity(amount) {
                let quantityInput = document.getElementById('quantity');
                let currentQuantity = parseInt(quantityInput.value);
                
                // Update quantity if within valid range
                if (currentQuantity + amount >= 1) {
                    quantityInput.value = currentQuantity + amount;
                }
            }
        </script>
    </x-slot:footer>
</x-layout-site>