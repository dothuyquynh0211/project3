<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class LayoutComposer
{
    public function compose(View $view)
    {
        $view->with('category', Category::all());
    }
}