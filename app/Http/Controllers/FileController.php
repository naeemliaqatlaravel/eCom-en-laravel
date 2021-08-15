<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    function upload(Request $request)
    {
    	$result=$request->file('filename')->store('apiDocs');
    	echo $result;
    }
}
