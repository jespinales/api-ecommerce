<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateCategoryController extends Controller
{
    public function __invoke(Category $category, UpdateCategoryRequest $request)
    {
        $category->update($request->validated());
        return jsend_success($category);
    }
}
