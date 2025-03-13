<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class flashSale extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args_product_sale = [  
            ['status', '=', 1],  
            ['pricesale','>',0],
        ];
        $product_sale = Product::where($args_product_sale)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('components.flash-sale', compact('product_sale'));
    }
}