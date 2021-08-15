<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    //
    function add(Request $request){
    	$model=new Device;
    	$model->name=$request->name;
    	$model->member_id=$request->member_id;
    	$result=$model->save();
    	if ($result) {
    	return ['success'=>'Add has been Saved'];

    	}else{
    	return ['error'=>'Operation Faield'];

    	}

    }


    function update(Request $request)
    {
    	$model=Device::find($request->id);
    	$model->name=$request->name;
    	$model->member_id=$request->member_id;
    	$result=$model->save();
    	if ($result) {
    	return ['update','Data has been updated'];

    	}else{
    	return ['update','Operation Failed'];

    	}
    }

function delete($id)
{
		$model=Device::find($id);
		$result=$model->delete();
		if ($result) {
	return ['delete','Data Deleted='.$id];
	
		}else{
		return ['delete','Operation Failed='.$id];

		}

}


	function search($name)
			{
				return Device::where("name","like","%".$name."%")->get();
			}


			function list()
			{
				return Device::all();

			}

}
