<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Bid;

class BidController extends Controller
{
    //
    public function makeBid(Request $data){
        $productId = $data['product_id'];
        $amount = $data['bid'];

        $bid = new Bid([
            'amount' => $amount,
        ]);

        $user = User::find(\Auth::user()->id);
        $product = Product::find($productId);

        $bid->user()->associate($user);
        $bid->product()->associate($product);
        $bid->save();

        //Update final Price of product
        $product->final_price = $amount;
        $product->save();

        
        return redirect('/product/'.$productId);
    }
}
