<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class NavigationController extends Controller
{
    //Account Page Redirects
    public function addProducts(){
       
    }

    public function madeBids(){
        
    }

    public function homePage(){

        $featuredProducts = Product::inRandomOrder()->get();
        
        $newProducts = Product::orderBy('created_at','desc')->get();

        return view("welcome",compact("featuredProducts","newProducts"));

    }


    public function changeAccountInformation(){
        return view('auth/changeinfo');
    }

}
