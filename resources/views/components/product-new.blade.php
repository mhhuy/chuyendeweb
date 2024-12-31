<section class="container mx-auto py-12 px-6">
    <h2 class="text-2xl font-semibold mb-8 text-center">
        New Arrivals
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <x-product-card :productitem="$product" />
        @endforeach
    </div>
</section>
