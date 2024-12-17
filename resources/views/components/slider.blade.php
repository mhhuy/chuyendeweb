<Slider class="bg-gray-100">
    <!-- Slider Container -->
    <div class="relative w-full max-w-full overflow-hidden rounded-lg shadow-lg h-80">
        <!-- Slider Images -->
        <div class="flex transition-transform duration-700 ease-in-out" id="slider">
            <img src="https://d3design.vn/uploads/summer_sale_holiday_podium_display_on_yellow_background.jpg"
                alt="Image 1" class="w-full flex-shrink-0 object-cover" />
            <img src="https://d3design.vn/uploads/summer_242_01.jpg" alt="Image 2"
                class="w-full flex-shrink-0 object-cover" />
            <img src="https://via.placeholder.com/1600x900/32CD32/FFFFFF?text=Image+3" alt="Image 3"
                class="w-full flex-shrink-0 object-cover" />
        </div>

        <!-- Navigation Buttons -->
        <button id="prev"
            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700">
            &#8592;
        </button>
        <button id="next"
            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700">
            &#8594;
        </button>
    </div>

    <script>
        // JavaScript to handle slider functionality
        const prevButton = document.getElementById("prev");
        const nextButton = document.getElementById("next");
        const slider = document.getElementById("slider");
        const images = slider.children;
        let currentIndex = 0;

        // Function to show the next image
        function showNext() {
            currentIndex = (currentIndex + 1) % images.length;
            updateSliderPosition();
        }

        // Function to show the previous image
        function showPrev() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateSliderPosition();
        }

        // Function to update slider position
        function updateSliderPosition() {
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        // Event listeners for navigation buttons
        nextButton.addEventListener("click", showNext);
        prevButton.addEventListener("click", showPrev);
    </script>
</Slider>
<x-slot:footer>
    <script>
        document.getElementById("hamburger").onclick = function toggleMenu() {
            const navToggle = document.getElementsByClassName("toggle");
            for (let i = 0; i < navToggle.length; i++) {
                navToggle.item(i).classList.toggle("hidden");
            }
        };
    </script>
</x-slot:footer>
