<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function registered()
    {
    	$users = User::all();
    	return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id)
    {
       $users = User::findOrfail($id);

       return view('admin.register-edit')->with('users',$users);

    }

    public function registerupdate(Request $request, $id)
    {
    	$users = User::find($id);
    	$users->name = $request->input('name');
    	$users->phone = $request->input('phone');
        $users->email = $request->input('email');
    	$users->usertype = $request->input('usertype');
    	$users->update();
        
        Session::flash('statuscode','success');
    	return redirect('/role.register')->with('status','Your Data is Updated Successfully!!!');
    }
    public function registerdelete($id)
    {
    	$users = User::findOrfail($id);
    	$users->delete();

        Session::flash('statuscode','error');
    	return redirect('/role.register')->with('status','Your Data is Deleted Successfully!!!');
    }
}
