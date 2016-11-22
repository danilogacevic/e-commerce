<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Photo;

class AdminMediaController extends Controller
{
    //

    public function index(){

    	$photos = Photo::all();

    	return view('admin.media.index',compact('photos'));
    }

    public function create(){

    	return view('admin.media.upload');
    }

    public function store(Request $request){

    	$file = $request->file('file');

    	$name = time() . $file->getClientOriginalName();

    	$file->move('images',$name);

        $product = Auth::user()->products()->orderBy('id','desc')->first();

        $product->photos()->create(['name'=>$name]);

       
    }

    public function destroy($id){

    	$photo = Photo::findOrFail($id);

    	unlink(public_path() . $photo->file);

    	$photo->delete();

    	return redirect('admin/media');

    }
}
