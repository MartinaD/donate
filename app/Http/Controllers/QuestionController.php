<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'question' =>'required',
        ]);

        $question= new Question();
        $question->name = request('name');
        $question->email = request('email');
        $question->question = request('question');
        $question->save(); 
       
        return response()
            ->json([
                'sent' => true,
            ]);
    }

}
