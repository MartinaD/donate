<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Campaign;


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

    public function show($name)
    {
    	$category = Category::where('name', '=', $name)->first();
		$campaigns = Campaign::where('category_id', '=', $category->id)->get();

        return response()
            ->json([
                'campaigns' => $campaigns,
                'progress' => 20
            ]);
    }

}
