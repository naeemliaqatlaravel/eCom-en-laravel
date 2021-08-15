<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
class RoleController extends Controller
{
    //
    public function addRole()
    {
    	$roles=[
    		["name"=>"Adminestraion"],
    		["name"=>"Editor"],
    		["name"=>"Author"],
    		["name"=>"Contributor"],
    		["name"=>"Subscriber"]
    	];

    	Role::insert($roles);
    	return "Role are create success";
    }

    public function addUser()
    {
    	$user=new User();
    	$user->name="shahzad";
    	$user->email="shahzad@gmail.com";
    	$user->password=encrypt("shahzad");
    	$user->save();

    	$roleids=[1,2];
    	$user->roles()->attach($roleids);

    	    	return "Record has been create success";

    
    }

    public function getallrolebyuser($id)
    {
    	$user=User::find($id);
    	$roles=$user->roles;
    	return $roles;
    }

     public function getalluserbyrole($id)
    {
    	$user=Role::find($id);
    	$roles=$user->users;
    	return $roles;
    }

}
