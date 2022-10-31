<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //
    public function index(){
        $data = food::all();
        $chefsdata = chefs::all();
        return view('home',compact("data","chefsdata"));
    }
    public function redirects()
    {
        $data = food::all();
        $chefsdata = chefs::all();
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin/admin');
        }else{

            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->count();

            return view('home',compact("data","chefsdata","count"));
        }
    }
    public function addcart(Request $request,$id)
    {
       if(Auth::id())
       {
        $user_id = Auth::id();

        $foodid = $id;

        $quantity = $request->quantity;

        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->food_id = $foodid;
        $cart->quanitity= $quantity;

        $cart->save();

        return redirect()->back();
       }
       else
       {
        return redirect('/login');
       }
    }

    public function showcart(Request $request,$id)
    {
        $count = cart::where('user_id',$id)->count();
        $dataTwo = cart::select('*')->where('user_id','=',$id)->get();
        $data = cart::where('user_id',$id)->join('food', 'carts.food_id' , '=' , 'food.id')->get();
        return view("showcart",compact("count","data",'dataTwo'));
    }
    public function remove($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();
        
    }
    public function orderconfirm(Request $request)
    {
        foreach($request->foodname as $key => $foodname)
        {
            $data = new order;

            $data->foodname = $foodname;

            $data->price = $request->price[$key];

            $data->quantity = $request->quantity[$key];

            $data->name = $request->name;

            $data->phone = $request->phone;

            $data->address = $request->address;

            $data->save();
        }

        return redirect()->back();
    }
}
