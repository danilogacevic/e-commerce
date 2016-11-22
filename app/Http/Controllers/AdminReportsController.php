<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Report;

class AdminReportsController extends Controller
{
    public function index(){

    	$reports = Report::all();

    	return view('admin.products.index',compact('reports'));
    }

    public function destroy($id){

    	Report::findOrFail($id)->delete();

    	return redirect()->back();
    }
}
