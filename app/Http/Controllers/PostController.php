<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use File;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')
            ->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->get(['id', 'title', 'image']);

        return response()
            ->json([
                'posts' => $posts
            ]);
    }

    public function create()
    {
        $form = Post::form();
        return response()
            ->json([
                'form' => $form
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|max:3000',
            'image' => 'required|image',
            'category_id' => 'required'

        ]);

        $post= new Post;

        $post->user_id = auth()->user()->id;
        $post->title = request('title');
        $post->body = request('body');
        $post->category_id = Input::get('category_id');


        
  		if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(350, 350)->save( public_path('/uploads/' . $filename ) );

            $post->image=$filename;
        }

        
        $post->save();

        
        return response()
            ->json([
                'saved' => true,
                'id' => $post->id,
                'message' => 'Успeшно!'
            ]);
    }


    public function show($id)
    {
        $post = Post::with(['user'])->findOrFail($id);

        return response()
            ->json([
                'post' => $post
            ]);
    }


    public function edit($id, Request $request)
    {
        // $form = $request->user()->posts()
        //     ->with(['ingredients' => function($query) {
        //         $query->get(['id', 'name', 'qty']);
        //     }, 'directions' => function($query) {
        //         $query->get(['id', 'description']);
        //     }])
        //     ->findOrFail($id, [
        //         'id', 'name', 'description', 'image'
        //     ]);

        // return response()
        //     ->json([
        //         'form' => $form
        //     ]);
    }

    public function update($id, Request $request)
    {
         dd($request->all());
        // $this->validate($request, [
        //     'title' => 'required|max:255',
        //     'body' => 'required|max:3000',
        //     'image' => 'image',
        //     'ingredients' => 'required|array|min:1',
        //     'ingredients.*.id' => 'integer|exists:recipe_ingredients',
        //     'ingredients.*.name' => 'required|max:255',
        //     'ingredients.*.qty' => 'required|max:255',
        //     'directions' => 'required|array|min:1',
        //     'directions.*.id' => 'integer|exists:recipe_directions',
        //     'directions.*.description' => 'required|max:3000'
        // ]);

        // $recipe = $request->user()->recipes()
        //     ->findOrFail($id);

        // $ingredients = [];
        // $ingredientsUpdated = [];

        // foreach($request->ingredients as $ingredient) {
        //     if(isset($ingredient['id'])) {
        //         RecipeIngredient::where('recipe_id', $recipe->id)
        //             ->where('id', $ingredient['id'])
        //             ->update($ingredient);

        //         $ingredientsUpdated[] = $ingredient['id'];
        //     } else {
        //         $ingredients[] = new RecipeIngredient($ingredient);
        //     }
        // }

        // $directions = [];
        // $directionsUpdated = [];

        // foreach($request->directions as $direction) {
        //     if(isset($direction['id'])) {
        //         RecipeDirection::where('recipe_id', $recipe->id)
        //             ->where('id', $direction['id'])
        //             ->update($direction);

        //         $directionsUpdated[] = $direction['id'];
        //     } else {
        //         $directions[] = new RecipeDirection($direction);
        //     }

        // }

        // $recipe->name = $request->name;
        // $recipe->description = $request->description;

        // // upload image
        // if ($request->hasfile('image') && $request->file('image')->isValid()) {
        //     $filename = $this->getFileName($request->image);
        //     $request->image->move(base_path('/public/images'), $filename);

        //     // remove old image
        //     File::delete(base_path('/public/images/'.$recipe->image));
        //     $recipe->image = $filename;
        // }

        // $recipe->save();

        // RecipeIngredient::whereNotIn('id', $ingredientsUpdated)
        //     ->where('recipe_id', $recipe->id)
        //     ->delete();

        // RecipeDirection::whereNotIn('id', $directionsUpdated)
        //     ->where('recipe_id', $recipe->id)
        //     ->delete();

        // if(count($ingredients)) {
        //     $recipe->ingredients()->saveMany($ingredients);
        // }

        // if(count($directions)) {
        //     $recipe->directions()->saveMany($directions);
        // }

        // return response()
        //     ->json([
        //         'saved' => true,
        //         'id' => $recipe->id,
        //         'message' => 'You have successfully updated recipe!'
        //     ]);
    }

    public function destroy($id, Request $request)
    {
        $post = $request->user()->posts()
            ->findOrFail($id);

        // remove image
        File::delete(base_path('/public/uploads/'.$post->image));

        $post->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}

