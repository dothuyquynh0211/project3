<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

class LayoutComposer
{
    public function compose(View $view)
    {
        $view->with('category', Category::all());
        $view->with('cart_count', Cart::count());
    }
}