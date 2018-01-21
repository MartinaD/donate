<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Donation;


class DonationController extends Controller
{	
	public function index() 
    {
        $donations = Donation::orderBy('created_at', 'desc')
            ->get(['id', 'name', 'email', 'sum']);

        return response()
            ->json([
                'donations' => $donations,
            ]);
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'sum' =>'required|numeric',
            'card_num' => 'required|numeric|min:16'
        ]);

        $donation= new Donation();
        $donation->name = request('name');
        $donation->email = request('email');
        $donation->sum = request('sum');
        $donation->campaign_id = request('campaign');
        $donation->card_num =  request('card_num');
        if(request('private') != true){
  			$donation->private = 0;
        }
        else{
        	$donation->private = 1;
        }

        if(request('comment')!=null){
        	$donation->comment = request('comment');
        }
        $donation->save(); 
       	
         
        return response()
            ->json([
                'saved' => true,
                'id' => $donation->id ,
              
            ]);
    }
}
