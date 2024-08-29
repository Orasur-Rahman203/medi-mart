<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Support\Carbon;
use Image;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $carts=Cart::all();
        return view ('backend.cart_details.cart_index',compact('carts'));
    }

    public function create(){
        $medicines=Medicine::all();
        $users=User::all();
        return view ('backend.cart_details.cart_create',compact('users','medicines'));
    }


    public function store(Request $request){

        $medicine = Medicine::find($request->medicine_id);

        if($request->prescription_image){
            $image=$this->UploadImage('prescription',$request->prescription_image);
            // dd("kjdfkd");
        }else{
            $image='No need';
        }
        $prescription_image=$image;
        DB::table('carts')->insert([
            'medicine_id' => $medicine->id,
            'user_id' => auth()->user()->id,
            'unit_price' => $medicine->medicine_price,
            'quantity' => $request->quantity,
            'total_price' =>( $medicine->medicine_price * $request->quantity ) ?? 0,
            'prescription_image' =>$image
            
              
        ]);
        return redirect()->back();

    }

    public function edit($id){
        $medicines=Medicine::all();
        $users=User::all();
        $carts=Cart::find($id);
        return view ('backend.cart_details.cart_edit',compact('carts','users','medicines'));
    }


    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');
            Cart::where('id', $id)->update($data);
            return redirect()->route('cart_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }



      //Individual post delete
      public function delete($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();

    }

       //Image upload function
       public function UploadImage($presc_name,$prescription_image){
        $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
        $file_name=$timestamp . '-'.'prescription'. '.' .$prescription_image->getClientOriginalExtension();
        $pathToUpload=storage_path().'/app/public/prescriptions/';
 
        if(!is_dir($pathToUpload)){
         mkdir($pathToUpload, 0755, true);
 
        }
        Image::make($prescription_image)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
     }
 
     //Image update then previous image delete in storage folder
     private function unlink($prescription_image){
         $pathToUpload=storage_path().'/app/public/prescriptions/';
         if($prescription_image != '' && file_exists($pathToUpload.$prescription_image)){
             @unlink($pathToUpload.$prescription_image);
         }
     }

}
