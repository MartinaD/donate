<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{

    public function index() 
    {
        $categories = Category::orderBy('created_at', 'desc')
            ->get(['id', 'name', 'image']);

        return response()
            ->json([
                'categories' => $categories
            ]);
    }

}
