<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function show(User $user)
    {
    	 $posts=$user->posts;
    	
    	 return view('welcome',compact('posts'));
    }

    public function profile()
    {
        $user=auth()->user();
        return view('profile',compact('user'));
    }

    public function upload(Request $request)
    {

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(350, 350)->save( public_path('/uploads/' . $filename ) );

            $user = Auth::user();
            $user->profile_pic = $filename;
            $user->save();
        }

        return response()
            ->json([
                'image' => 'Успешно е додадена фотографија!']);
        return view('profile', array('user' => Auth::user()) );

    }

    public function index()
    {

    	$posts= auth()->user()->posts; //zemi gi postovite na avtenticiraniot user

    	return response()->json($posts);


    }
}
