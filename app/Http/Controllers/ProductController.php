<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
}
