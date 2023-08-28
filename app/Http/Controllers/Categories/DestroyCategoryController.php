<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class DestroyCategoryController extends Controller
{
    public function __invoke(Category $category): Response
    {
        $category->delete();
        return jsend_success();
    }
}
