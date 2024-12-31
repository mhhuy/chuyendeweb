<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $product_item;

    public function __construct($productitem)
    {
        $this->product_item = $productitem;
    }

    public function render(): View|Closure|string
    {
        $product = $this->product_item;
        return view('components.product-card', compact('product'));
    }
}
