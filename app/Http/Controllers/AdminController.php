<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Food;
use App\Chef;
use App\Order;


use App\Reservation;
use App\Cart;




class AdminController extends Controller
{
   public function user(){

      $data=User::all();
    return view('admin.users',compact('data')); //compact('data')  or //['data'=>$data]
   }

   public function delete($id){
      $data=User::find($id);
      $data->delete();
    return redirect()->route('users'); //return redirect()->back();
   }

   public function foodmenu(){
      $data=Food::Select("*")->orderby("id","ASC")->paginate(2); //get() //paginate(2)
   //$data=Food::all();

    return view('admin.foodmenu',compact('data')); 
   }
   
   public function uploadfood(Request $request){
      $data=new Food();
      ///////image code (vip)/////
      /*$image=$request->image;
      $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('foodimage',$imagename);
      $data->image=$imagename;*/
      if($request->has('image')){
         $image=$request->image;
         $extension=strtolower($image->extension());
         $imagename=time().rand(1,1000).".".$extension;
         $image->move('foodimage',$imagename);
         $data->image=$imagename;
     }
      //////////////////////////////
      $data->title=$request->title;
      $data->price=$request->price;
      $data->description=$request->description;
      $data->save();
      return redirect()->back();
   } 
   public function deletefood($id){
      $data=Food::find($id);
      $data->delete();
      return redirect()->back();
   }
   public function updatefood($id){
      $data=Food::find($id);
      return view('admin/updatefood',compact('data'));
   }
   public function updatefooddata(Request $request ,$id ){
      $data=Food::find($id);
      ///////image code (vip)/////
      /*$image=$request->image;
      $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('foodimage',$imagename);
      $data->image=$imagename;*/
      if($request->has('image')){
         $image=$request->image;
         $extension=strtolower($image->extension());
         $imagename=time().rand(1,1000).".".$extension;
         $image->move('foodimage',$imagename);
         $data->image=$imagename;
     }
      
      //////////////////////////////
      $data->title=$request->title;
      $data->price=$request->price;
      $data->description=$request->description;
      $data->save();
      return redirect()->route('foodmenu');
   }
   

   //reservation
   public function reservation(request $request){
      $data=New Reservation();
      $data->name=$request->name;
      $data->email=$request->email;
      $data->phone=$request->phone;
      $data->guest=$request->guest;
      $data->date=$request->date;
      $data->time=$request->time;
      $data->message=$request->message;
      $data->save();
      return redirect()->back();

   }
   public function reservationControl(){
      $data=Reservation::all();
      return view('admin.reservationControl',compact('data'));
      }
      public function deletereservation($id){
         $data=reservation::find($id);
         $data->delete();
         return redirect()->back();
      }
      ////////Chef
      public function chefControl(){
         $data=Chef::all();
         return view('admin.chefControl',compact('data'));
      }
      
      
      ///
      public function chef_Control(request $request){
         $data=new Chef();
         ///////image code (vip)/////
        /* $image=$request->image;
         $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);
         $data->image=$imagename;*/
         if($request->has('image')){
            $image=$request->image;
            $extension=strtolower($image->extension());
            $imagename=time().rand(1,1000).".".$extension;
            $image->move('chefimage',$imagename);
            $data->image=$imagename;
        }
         //////////////////////////////
         $data->name=$request->name;
         $data->speciality=$request->speciality;
         $data->save();
         return redirect()->back();
      }
      /////deletechef
      
      public function deletechef($id){
         $data=Chef::find($id);
         $data->delete();
         return redirect()->back();
      }
      ///
      public function updatechef($id){
         $data=Chef::find($id);
         return view('admin/updatechef',compact('data'));
      }
      public function updatechefdata(Request $request ,$id ){
         $data=Chef::find($id);
         ///////image code (vip)/////
         /*$image=$request->image;
         $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);
         $data->image=$imagename;*/
         if($request->has('image')){
            $image=$request->image;
            $extension=strtolower($image->extension());
            $imagename=time().rand(1,1000).".".$extension;
            $image->move('chefimage',$imagename);
            $data->image=$imagename;
        }
         //////////////////////////////
         $data->name=$request->name;
         $data->speciality=$request->speciality;
         $data->save();
         return redirect()->route('chefControl');
      }

      //cart
      public function addcart($id, request $request){
         if(Auth::id()){
            $user_id=Auth::id();
            $food_id=$id;
            $cart=new Cart();
            $cart->quantity=$request->quantity;
            $cart->user_id=$user_id;
            $cart->food_id=$food_id;
            $cart->save();
            return redirect()->back();

         }else{

            return redirect('/login');

         }
      }
      //showcart
      public function showcart($id){

         $data=Cart::where('user_id',$id)->join('Food','food.id','=','carts.food_id')->get();
         $count=Cart::where('user_id',$id)->count();
         $data2=Cart::select("*")->where('user_id','=',$id)->get();
         return view('showcart',compact('count','data','data2'));
       
      } 
      //remove
     /* public function remove($id){
         $cart =Cart::where('id',$id)->first();

         $cart->delete();
         return redirect()->back();
      } */

/*public function remove($id)
{
   $data =Cart::where('id',$id)->first();

   // if ($data != null) {
        $data->delete();
      //  return redirect()->back();
   // }

    return redirect()->back();
} 
}*/
/**public function remove($id)
{
    $data =Cart::find($id);
    $data->delete();
    return redirect()->back();
}*/
public function remove($id) {
   $data = Cart::Find($id);
$data->delete();
return redirect()->back();
} 
//ordercofirm
public function orderconfirm(Request $request){
   if ($request->foodname != null){
   foreach($request->foodname as $key=> $foodname){
      $data=new Order;
      $data->foodname=$foodname;
      $data->price=$request->price[$key];
      $data->quantity=$request->quantity[$key];
      $data->name=$request->name;
      $data->phone=$request->phone;
      $data->address=$request->address;
      $data->save();

   
   }
   return redirect()->back();


   }
   return redirect()->back();

}
public function ordercontrol(){
   $data=Order::Select("*")->orderby("id","ASC")->get(); //get() //paginate(2)
//$data=Food::all();

 return view('admin.order',compact('data')); 
}
}