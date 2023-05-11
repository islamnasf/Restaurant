<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Food;
use App\User;
use App\Cart;
use App\Chef;


class IslamController extends Controller
{
    public function index(){
        $data=Food::all();
        $data2=Chef::all();
        $user_id=Auth::id();
        $count=Cart::where('user_id',$user_id)->count();

        return view('index',compact('data2','count','data'));

    }
    public function redirects(){
        $data=Food::all();
        $data2=Chef::all();


        $usertype=Auth::user()->usertype;
        if( $usertype==0){
            $user_id=Auth::id();
            $count=Cart::where('user_id',$user_id)->count();
        return view('index',compact('data2','count','data'));
        }
        else
        {
            $data=User::all();

            return view('admin.users',compact('data'));

        }
    }
}
