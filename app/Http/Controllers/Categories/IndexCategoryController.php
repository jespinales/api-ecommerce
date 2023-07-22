<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexCategoryController extends Controller
{
    public function __invoke()
    {
        return jsend_success([
            'categories' => Category::all()
        ]);
    }
}
