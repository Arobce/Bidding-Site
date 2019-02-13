<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Product;
use App\User;
use App\Bid;

class ProductController extends Controller
{
    //
    public function create(){
        return view('products/addproducts');
    }

    public function store(Request $data){

        $product = new Product(
            [
                'name'=>$data['name'],
                'image_url'=>$data['image_url'],
                'description'=>$data['description'],
                'category'=>$data['category'],
                'initial_price'=>$data['initial_price'],
                'final_price'=>$data['initial_price']
            ]
        );

        $user = User::find(\Auth::user()->id);

        $product->user()->associate($user);
        $product->save();

    
        return redirect('/my-account');
    }

    public function view(Request $request,$id){
        
        $product = Product::find($id);

        $bids = Bid::where('product_id',$id)->orderBy('created_at','desc')->get();

        return view("products/viewproducts",compact('product','bids'));
    }

    public function updateTime(Request $data){

        $data = json_decode($data->data);

        
        foreach($data as $d){

            $product = Product::find($d->id);
            
            $product->remaining_time = $d->time;
            $product->save();
        
        }
        return $data;

    }

    public function viewProductsByCategory(Request $data,$category){

        $products = Product::where('category',$category)->get();

        return view("products/categories",compact('products','category'));

    }

    public function searchProduct(Request $data){

        $category = $data->keyword;
        $products = Product::where('category',$data->keyword)->get();

        return view("products/categories",compact('products','category'));

    }

    public function allCategories(){
        $products = Product::select('category')->distinct()->get();

        return view("productcategories",compact('products'));
    }
}
