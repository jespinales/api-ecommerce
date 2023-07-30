<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowCategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        return jsend_success($category);
    }
}
