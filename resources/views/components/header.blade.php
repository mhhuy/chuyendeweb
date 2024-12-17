<header class="bg-[#e8e8e5]">
    <div class="container mx-auto flex items-center justify-between p-4">
        <!-- Logo -->
        <div class="text-xl font-semibold">
            <a href="#" class="flex items-center">
                <img src="https://icolor.vn/wp-content/uploads/2021/08/logo-nike-icolorBranding-1024x661.jpg"
                    alt="Logo" class="mr-2 w-32" />
            </a>
        </div>

        <!-- Menu (Navbar links) -->
        <x-main-menu />

        <!-- Actions: Login, Cart, Search, Hamburger for mobile -->
        <div class="flex items-center space-x-4">
            <!-- Search -->
            <div class="relative">
                <input type="text" class="px-3 py-2 rounded-lg border border-gray-300 focus:outline-none"
                    placeholder="Search" />
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 absolute top-1/2 right-2 transform -translate-y-1/2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M10 16a6 6 0 100-12 6 6 0 000 12z" />
                </svg>
            </div>

            <!-- Cart -->
            <a href="{{ url('/gio-hang') }}" class="relative flex items-center">
                <!-- Font Awesome Shopping Cart Icon -->
                <i class="fas fa-shopping-cart text-gray-700 text-lg"></i>

                <!-- Badge with number in the top-right corner -->
                <span
                    class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center transform translate-x-1 -translate-y-1">
                    3
                </span>
            </a>

            <!-- Login -->
            <a href="{{ url('/dang-nhap') }}" class="relative flex items-center group">
                <!-- Font Awesome Login Icon -->
                <i class="fas fa-user-circle text-gray-700 text-lg"></i>

                <!-- Tooltip Text -->
                <span
                    class="absolute bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity text-sm bg-gray-800 text-white rounded px-2 py-1">
                    Đăng nhập
                </span>
            </a>
        </div>
    </div>
</header>
