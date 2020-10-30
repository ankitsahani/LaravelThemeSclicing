<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Abouts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutsController extends Controller
{
    public function index()
    {
    	$abouts = Abouts::all();
    	return view('admin.abouts')->with('abouts',$abouts);

    }
    public function store(Request $request)
    {
    	$abouts = new Abouts;
    	$abouts->title = $request->input('title');

    	$abouts->subtitle = $request->input('subtitle');

    	$abouts->description = $request->input('description');

    	$abouts->save();


    	Session::flash('statuscode','info');
    	return redirect('abouts')->with('status','Data Added Successfully!!!');
    }
    public function edit($id)
    {

        $abouts = Abouts::findOrfail($id);
        
        return view('admin.abouts.edit')->with('abouts',$abouts);
    }
    public function update( Request $request,$id)
    {
    	$abouts = Abouts::findOrfail($id);
    	$abouts->title = $request->input('title');
    	$abouts->subtitle = $request->input('subtitle');
    	$abouts->description = $request->input('description');

    	$abouts->update();
         
        Session::flash('statuscode','success'); 
    	return redirect('abouts')->with('status','Data Updated Successfully!!!');


    }
     public function delete($id)
    {
    	$abouts = Abouts::findOrfail($id);
    	$abouts->delete();


    	Session::flash('statuscode','error');
    	return redirect('abouts')->with('status','Your Data is Deleted Successfully!!!');
    }
}
