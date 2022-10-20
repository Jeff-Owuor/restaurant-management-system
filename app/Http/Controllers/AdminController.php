<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

class AdminController extends Controller
{
    //
    public function user(){
        $data = user::all();
        return view('admin.users',compact("data"));
    }
    public function deleteuser($id){
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function foodmenu(){
        return view('admin.foodmenu');
    }
    public function upload(Request $request){
        $data = new Food;
        $image = $request->image;
        // gives the image a unique name
        $imageName =  time().'.'.$image->getClientOriginalExtension(); 
        $image->move('foodimage',$imageName);

        $data->image= $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description; 
    }
}
