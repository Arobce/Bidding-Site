<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Bid;

class NavigationController extends Controller
{
    //Account Page Redirects
    public function addProducts(){
       
    }

    public function madeBids(){
        
    }

    public function homePage(){

        $featuredProducts = Product::inRandomOrder()->limit(5)->get();
        
        $newProducts = Product::orderBy('created_at','desc')->get();

        return view("welcome",compact("featuredProducts","newProducts"));

    }


    public function changeAccountInformation(){
        return view('auth/changeinfo');
    }

    public function viewMadeBids(){

        $userId = \Auth::user()->id;

        $bidsMade = DB::table('products')
        ->join("bids","bids.product_id","=","products.id")
        ->where('bids.user_id',$userId)
        ->select("products.id","products.name","bids.created_at","bids.amount")
        ->get();

        return view('products/viewbids',compact('bidsMade'));
    }

}
