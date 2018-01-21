<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Category;
use App\User;
use App\Tag;
use File;


class CampaignController extends Controller
{
     public function __construct()
    {     
        $this->middleware('auth:api')
            ->except(['index', 'show']);
    }

    public function index() 
    {
        $campaigns = Campaign::orderBy('created_at', 'desc')->offset(0)->limit(9)
            ->get(['id', 'title', 'body', 'image', 'goalamount']);

        return response()
            ->json([
                'campaigns' => $campaigns,
                'progress' => 20
            ]);
    }

    public function getMoreCamp(Request $request) 
    {
        $campaigns = Campaign::orderBy('created_at', 'desc')->offset(0)->limit(request('limit'))
            ->get(['id', 'title', 'body', 'image', 'goalamount']);

        $campaigns->progress = 20;

        return response()
            ->json([
                'campaigns' => $campaigns,
                'progress' => 20
            ]);
    }


    public function create()
    {
        $form = Campaign::form();
        return response()
            ->json([
                'form' => $form
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'goalamount' =>'required|digits_between:3,7',
            'body' => 'required',
            'category' => 'required',
            'image' => 'required|image',

        ]);

        $campaign= new Campaign();
        $campaign->user_id = auth()->user()->id;
        $campaign->title = request('title');
        $campaign->goalamount = request('goalamount');
        $campaign->category_id = request('category');
        $campaign->body =  request('body');

        if(!$request->hasFile('image')) {
            return abort(404, 'Image not uploaded!');
        }
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path('public/uploads'), $filename);
            // Image::make($image)->resize(350, 350)->save( public_path('/uploads/' . $filename ) );

            $campaign->image=$filename;
        }

        $campaign->save(); 
       

        if($request->tags){

            foreach($request->tags as $t) {

                if($t!=''){
                    $tag = Tag::where('name', $t['name'])->first();
                    if (!$tag) {
                        $tag = new Tag();
                    }
                    $tag->name = $t['name'];
                    $tag->save();
                    $campaign->tags()->attach($tag->id);
                }
            }  
        }
         
        return response()
            ->json([
                'saved' => true,
                'id' => $campaign->id,
                'name' => $campaign->title
            ]);
    }


    public function show($id)
    {
        $campaign = Campaign::where('id', '=', $id)->first();
        $category = Category::where('id', '=', $campaign->category_id)->first();
        return response()
            ->json([
                'campaign' => $campaign,
                'category' => $category
            ]);
    }


    // public function edit($id, Request $request)
    // {
    //     // $form = $request->user()->posts()
    //     //     ->with(['ingredients' => function($query) {
    //     //         $query->get(['id', 'name', 'qty']);
    //     //     }, 'directions' => function($query) {
    //     //         $query->get(['id', 'description']);
    //     //     }])
    //     //     ->findOrFail($id, [
    //     //         'id', 'name', 'description', 'image'
    //     //     ]);

    //     // return response()
    //     //     ->json([
    //     //         'form' => $form
    //     //     ]);
    // }

    // public function update($id, Request $request)
    // {
    //      dd($request->all());
    //     // $this->validate($request, [
    //     //     'title' => 'required|max:255',
    //     //     'body' => 'required|max:3000',
    //     //     'image' => 'image',
    //     //     'ingredients' => 'required|array|min:1',
    //     //     'ingredients.*.id' => 'integer|exists:recipe_ingredients',
    //     //     'ingredients.*.name' => 'required|max:255',
    //     //     'ingredients.*.qty' => 'required|max:255',
    //     //     'directions' => 'required|array|min:1',
    //     //     'directions.*.id' => 'integer|exists:recipe_directions',
    //     //     'directions.*.description' => 'required|max:3000'
    //     // ]);

    //     // $recipe = $request->user()->recipes()
    //     //     ->findOrFail($id);

    //     // $ingredients = [];
    //     // $ingredientsUpdated = [];

    //     // foreach($request->ingredients as $ingredient) {
    //     //     if(isset($ingredient['id'])) {
    //     //         RecipeIngredient::where('recipe_id', $recipe->id)
    //     //             ->where('id', $ingredient['id'])
    //     //             ->update($ingredient);

    //     //         $ingredientsUpdated[] = $ingredient['id'];
    //     //     } else {
    //     //         $ingredients[] = new RecipeIngredient($ingredient);
    //     //     }
    //     // }

    //     // $directions = [];
    //     // $directionsUpdated = [];

    //     // foreach($request->directions as $direction) {
    //     //     if(isset($direction['id'])) {
    //     //         RecipeDirection::where('recipe_id', $recipe->id)
    //     //             ->where('id', $direction['id'])
    //     //             ->update($direction);

    //     //         $directionsUpdated[] = $direction['id'];
    //     //     } else {
    //     //         $directions[] = new RecipeDirection($direction);
    //     //     }

    //     // }

    //     // $recipe->name = $request->name;
    //     // $recipe->description = $request->description;

    //     // // upload image
    //     // if ($request->hasfile('image') && $request->file('image')->isValid()) {
    //     //     $filename = $this->getFileName($request->image);
    //     //     $request->image->move(base_path('/public/images'), $filename);

    //     //     // remove old image
    //     //     File::delete(base_path('/public/images/'.$recipe->image));
    //     //     $recipe->image = $filename;
    //     // }

    //     // $recipe->save();

    //     // RecipeIngredient::whereNotIn('id', $ingredientsUpdated)
    //     //     ->where('recipe_id', $recipe->id)
    //     //     ->delete();

    //     // RecipeDirection::whereNotIn('id', $directionsUpdated)
    //     //     ->where('recipe_id', $recipe->id)
    //     //     ->delete();

    //     // if(count($ingredients)) {
    //     //     $recipe->ingredients()->saveMany($ingredients);
    //     // }

    //     // if(count($directions)) {
    //     //     $recipe->directions()->saveMany($directions);
    //     // }

    //     // return response()
    //     //     ->json([
    //     //         'saved' => true,
    //     //         'id' => $recipe->id,
    //     //         'message' => 'You have successfully updated recipe!'
    //     //     ]);
    // }

    // public function destroy($id, Request $request)
    // {
    //     $campaign = $request->user()->campaigns()
    //         ->findOrFail($id);

    //     // remove image
    //     File::delete(base_path('/public/uploads/'.$campaign->image));

    //     $campaign->delete();

    //     return response()
    //         ->json([
    //             'deleted' => true
    //         ]);
    // }
}
