<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class ProductController extends Controller
{
    //
    public function index()
    {
        $slider=Product::all();
        return view('product',['img'=>$slider]);
    }
    public function detail($id)
    {

        $data= Product::find($id);
        return view('detail',['product'=>$data]);

    }
    public function search(Request $request)
    {
    
        $data=Product::where('name','like'.'%'.$request->input('query').'%')->get();
            return view('search',['img'=>$data]);
    }
    public function addToCart(Request $request)
    {

        if($request->session()->has('user'))
        {
            $cart=new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $cart->save();
             return redirect('/'); 
        }else{
           return redirect('/login'); 
        }
        
    }
    static function cart_count()
    {
        $user_id=session()->get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
        
    }

}

