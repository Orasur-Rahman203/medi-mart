<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Support\Carbon;
use Image;


class OrderController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $orders=Order::paginate(4);
        return view ('backend.order_details.order_index',compact('orders'));
    }

    public function create(){
        $medicines=Medicine::all();
        $users=User::all();
        return view ('backend.order_details.order_create',compact('users','medicines'));
    }

    public function store(Request $request){
        try{
     $data=$request->all();
  

     if($request->prescription_image){
        $image=$this->UploadImage('prescription',$request->prescription_image);
     }else{
        $image='No need';
    }
    $data['prescription_image']=$image;
     Order::create($data);
     return redirect()->back();
    }
    catch(Exception $e){
     return redirect()->route('order_create')->withMessage($e->getMessage());
    }

    }

    public function edit($id){
        $users=User::all();
        $orders=Order::find($id);
        return view ('backend.order_details.order_edit',compact('orders','users'));
    }

    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');
            Order::where('id', $id)->update($data);
            return redirect()->route('order_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }

      //Individual post delete
      public function delete($id){
        $data=Order::find($id);
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
