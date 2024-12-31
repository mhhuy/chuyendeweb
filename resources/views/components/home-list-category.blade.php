@foreach ($categorys as $categoryitem)
<div class="productcategory py-4">
    <div class="flex items-center">
        <div class="basis-1/3">
            <h1 class="font-bold text-3xl uppercase mb-4">{{ $categoryitem->name }}</h1>
        </div>
        <div class="basis-2/3">
            <ul class="flex flex-row-reverse *:p-2">
                @php
                    $categoryid = $categoryitem->id;
                @endphp
                <x-sub-list-category :categoryid="$categoryid" />
            </ul>
        </div>
    </div>
    <div class="grid md:grid-cols-4 grid-cols-2 gap-5">
        <x-home-product-category :categoryitem="$categoryitem" />
    </div>
</div>
@endforeach
