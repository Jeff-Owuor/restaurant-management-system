<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chefs;

class HomeController extends Controller
{
    //
    public function index(){
        $data = food::all();
        $chefsdata = chefs::all();
        return view('home',compact("data","chefsdata"));
    }
    public function redirects(){
        $data = food::all();
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin/admin');
        }else{
            return view('home',compact("data"));
        }
    }
}
