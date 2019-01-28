<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    //Account Page Redirects
    public function addProducts(){
       
    }

    public function madeBids(){
        
    }

    public function changeAccountInformation(){
        return view('auth/changeinfo');
    }

}
