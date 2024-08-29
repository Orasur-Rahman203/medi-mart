<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Company;
use App\Models\Slider;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FrontendHomeController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function home(){
        if(Auth::id()){
            $usertype=Auth()->user()->userType;
            if($usertype=='user'){
                $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
                $myItems=Cart::where('user_id',auth()->user()->id)->count();
                $sliders=Slider::all();
                $categories=Category::all();
                $medicines=Medicine::all();
                $companies=Company::all();
                return view ('frontend.f_home',compact('categories','medicines','companies','sliders','myOrderItems','myItems'));
            }
            else if($usertype=='admin'){
                $users=User::all()->count();
                $categories=Category::all()->count();
                $medicines=Medicine::all()->count();
                $companies=Company::all()->count();
                $vendors=Vendor::all()->count();
                $carts=Cart::all()->count();
                $orders=Order::all()->count();
                return view('backend.dashboard',compact('users','categories','medicines','companies','vendors','carts','orders'));
            }
        }

        
    }
    public function about(){
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $categories=Category::all();
        $medicines=Medicine::all();
        $companies=Company::all();
        return view ('frontend.f_about',compact('categories','medicines','companies','myOrderItems','myItems'));
    }

    public function shop($id){
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $medicines=Medicine::all();
        $categories = Category::where('id', $id)->get();
        return view ('frontend.f_shop',compact('medicines','categories','myOrderItems','myItems'));
    }

    public function product($id){
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $medicines=Medicine::where('id', $id)->get();
        $categories=Category::all();        
        $comments = Comment::where('medicine_id', $id)->get();
        $replies=Reply::all();
        return view ('frontend.f_product_details',compact('categories','medicines','myItems','comments','replies','myOrderItems'));
    }

    public function contact(){
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $categories=Category::all();
        $medicines=Medicine::all();
        return view ('frontend.f_contact',compact('categories','medicines','myOrderItems','myItems'));
    }
    public function myAccount(){
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $categories=Category::all();
        $orders=Order::where('user_id',auth()->user()->id)->get();
        return view ('frontend.f_myAccount',compact('categories','orders','myOrderItems','myItems'));
    }
  
    public function checkout(){
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $categories=Category::all();
        $cartItems=Cart::with('medicine')->where('user_id',auth()->user()->id)->get();
        return view ('frontend.f_checkout',compact('categories','cartItems','myOrderItems','myItems'));
    }
    public function add_comment(Request $request){
        if(Auth::id()){
            $comment = new comment;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->medicine_id=$request->medicine_id;
            $comment->save();
            return redirect()->back();
        }else{
            return redirect('login');
        }

        
    }

    public function add_reply(Request $request){
        if(Auth::id()){
            $reply=new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;
            $reply->save();
            return redirect()->back();

        }else{
            return redirect('login');
        }
    }

    public function cartItems()

    { 
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $categories = Category::all();
        $cartItems=Cart::with('medicine')->where('user_id',auth()->user()->id)->get();
        return view('frontend.f_cart',compact('cartItems','categories','myOrderItems','myItems'));
    }

    public function item_edit($id){
        $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
       
        $medicines=Medicine::all();
        $users=User::all();
        $carts=Cart::find($id);
        $categories=Category::all();
        return view ('frontend.f_cart_edit',compact('carts','users','medicines','categories','myOrderItems','myItems'));
    }

    public function item_update(Request $request,$id){
        Cart::where('id', $id)->update([
            'user_id' => auth()->user()->id,
            'quantity' => $request->quantity,
            'total_price' =>( $request->unit_price * $request->quantity ) ?? 0
        ]);
        return redirect()->route('cart_items');

    }
}
