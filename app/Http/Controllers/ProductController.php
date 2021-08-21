<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
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
    public function cartlist(Request $request)
    {
        $user_id=session()->get('user')['id'];    
        $product=DB::table('cart')->join('product','cart.product_id','=','product.id')->where('cart.user_id',$user_id)->select('product.*','cart.id as cart_id')->get();
        return view('cartlist',['cartlist'=>$product]);
    }
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function order()
    {
         $user_id=session()->get('user')['id'];
         $product=DB::table('cart')->join('product','cart.product_id','=','product.id')->where('user_id',$user_id)->sum('product.price');
        return view('order',['product'=>$product]);

    }
    public function orderplace(Request $request)
    {
        $user_id=session()->get('user')['id'];
         $allCart=Cart::where('user_id',$user_id)->get();
         foreach ($allCart as $cart) {
             $order=new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status='pending';
             $order->payment_method=$request->payment;
             $order->address=$request->address;
             $order->payment_status='pending';
             $order->save();
             Cart::where('user_id',$user_id)->delete();

         }
        return redirect('/');
    }
    public function myorder()
    {
        $user_id=session()->get('user')['id'];
        $order=DB::table('orders')->join('product','orders.product_id','=','product.id')->where('user_id',$user_id)->get();
         return view('myorder',['order'=>$order]);
    }
}

