<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Order;
use App\Models\Reservation;

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

    public function deletemenu($id){
       $data = food::find($id);
       $data->delete();
       return redirect()->back();
    }

    public function foodmenu(){
        $data = food::all();
        return view('admin.foodmenu',compact("data"));
    }

    public function updateview($id){
        $data = food::find($id);
        return view("admin.updateview",compact("data"));
    }

    public function update(Request $request,$id){
        $data = food::find($id);
        $image = $request->image;

        $imageName =  time().'.'.$image->getClientOriginalExtension(); 
        $image->move('foodimage',$imageName);
  
        $data->image= $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description; 
        $data->save();
        return redirect()->back();
    }

    public function reservation(Request $request){
        $data = new Reservation;
    
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phoneNumber = $request->phoneNumber;  
        $data->guests = $request->guests;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message; 
        $data->save();
        return redirect()->back();

    }

    public function viewreservation(){
       $data = reservation::all();
       return view('admin.adminreservation',compact('data'));
    }
    public function viewchef(){
        $data = chefs::all();
        return view('admin.adminchef',compact("data"));
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
        $data->save();
        return redirect()->back();
    }

    public function uploadchef(Request $request){
        $data = new Chefs;
        $image = $request->image;
        // gives the image a unique name
        $imageName =  time().'.'.$image->getClientOriginalExtension(); 
        $image->move('chefimage',$imageName);

        $data->image= $imageName;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }

    public function updatechef($id){
        $data = chefs::find($id);
        
        return view("admin.updatechef",compact("data"));
    }


   public function updatefoodchef(Request $request,$id){
    $data = chefs::find($id);
    $image = $request->image;

    if($image){
        $imageName =  time().'.'.$image->getClientOriginalExtension(); 
        $image->move('chefimage',$imageName);
        $data->image= $imageName;
    }
    
    $data->name = $request->name;
    $data->speciality = $request->speciality;
    $data->save();
    return redirect()->back();
   }

   public function deletechef($id){
       $data = chefs::find($id);
       $data->delete();
       return redirect()->back();
   }

   public function orders()
   {
       $data = order::all();
       return view('admin.orders',compact("data"));
   }

   public function search(Request $request)
   {
      $search = $request->search;
      $data = order::where('name','Like','%'.$search.'%')
      ->orwhere('foodname','Like','%'.$search.'%')
      ->get();
      return view('admin.orders',compact("data"));
   }
}
