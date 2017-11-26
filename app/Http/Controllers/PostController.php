<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
   
    public function index() 
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->get(['id', 'author', 'text', 'image']);

        return response()
            ->json([
                'posts' => $posts
            ]);
    }
}
