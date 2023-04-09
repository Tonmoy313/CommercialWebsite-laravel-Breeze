<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class frontendController extends Controller
{
    public function home(){

        $products=Product::where('status',1)->get();
        return view('frontend.index',compact('products'));
    }
    public function shop(){
        $products= Product::all();
        return view('frontend.shop', compact('products'));
    }
    //for single Product page
    public function singleProduct($id = null){
        if ($id !== null) {
            $product=Product::find($id);
            $relatedProduct=Product::where('categoryName',$product->categoryName)->get();
            $sameBrand=Product::where('brandName',$product->brandName)->get();
            
            //dd($relatedProduct);
            
            return view('frontend.single-product',compact('product','relatedProduct','sameBrand'));
        } else {
            
            echo'this is null';
            return view('frontend.single-product'); 
        
            }
    }
    public function cart(){
        return view('frontend.cart');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
}
