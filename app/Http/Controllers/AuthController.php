<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }

    // public function register(Request $request)
    // {
    //     var_dump("register"); die;
    //     $this->validate($request, [
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|between:6,25|confirmed',
    //        // 'profile_pic' => 'required|image',
    //     ]);

    //     $user = new User($request->all());
    //     $user->password = bcrypt($request->password);

    //     if($request->hasFile('photo')){
    //         $photo = $request->file('photo');
    //         $filename = time() . '.' . $photo->getClientOriginalExtension();
    //         Image::make($photo)->resize(350, 350)->save( public_path('/uploads/' . $filename ) );

    //         $user->profile_pic=$filename;
    //     }

    //     $user->save();

    //     return response()
    //         ->json([
    //             'registered' => true
    //         ]);
    // }

     public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,25|confirmed'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return response()
            ->json([
                'registered' => true
            ]);
    }


    public function login(Request $request)
    {
      
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|between:6,25'
        ]);

        $user = User::where('email', $request->email)->first();
        
        
        if($user && Hash::check($request->password, $user->password)) {
            // generate new api token
          $user->api_token = str_random(60);
          $user->save();

            return response()
                ->json([
                    'authenticated' => true,
                    'api_token' => $user->api_token,
                    'user_id' => $user->id
                ]);
        }

        return response()
            ->json([
                'email' => ['Е-маил адресата не се совпаѓа со лозинката!']
            ], 422);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response()
            ->json([
                'done' => true
            ]);
    }
}
