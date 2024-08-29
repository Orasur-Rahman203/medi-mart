<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Illuminate\Support\Carbon;
use Image;

class VendorController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $vendors=Vendor::paginate(4);
        return view ('backend.vendor_details.vendor_index',compact('vendors'));
    }

    public function create(){
        return view ('backend.vendor_details.vendor_create');
    }

    public function store(VendorRequest $request){
        try{
   
     $data=$request->all();
     if($request->store_image){
         $image=$this->UploadImage($request->vendor_name,$request->store_image);
     }
    
     $data['store_image']=$image;
     Vendor::create($data);
     return redirect()->route('vendor_index');
    }
    catch(Exception $e){
     return redirect()-route('vendor_create')->withMessage($e->getMessage());
    }
    }

    public function edit($id){
        $vendors=Vendor::find($id);
        return view ('backend.vendor_details.vendor_edit',compact('vendors'));
    }


    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');

            if($request->hasFile('store_image')){
                $vendors=Vendor::where('id',$id)->first();
                $this->unlink($vendors->store_image);
                $data['store_image']=$this->UploadImage($request->vendor_name,$request->store_image);
            }
            Vendor::where('id', $id)->update($data);
            return redirect()->route('vendor_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }


    //Individual post delete
    public function delete($id){
        $data=Vendor::find($id);
        $data->delete();
        return redirect()->back();
        
    }


    //Image upload function
    public function UploadImage($vendor_name,$store_image){
        $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
        $file_name=$timestamp . '-'.$vendor_name. '.' .$store_image->getClientOriginalExtension();
        $pathToUpload=storage_path().'/app/public/vendors/';
 
        if(!is_dir($pathToUpload)){
         mkdir($pathToUpload, 0755, true);
 
        }
        Image::make($store_image)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
     }
 
     //Image update then previous image delete in storage folder
     private function unlink($store_image){
         $pathToUpload=storage_path().'/app/public/vendors/';
         if($store_image != '' && file_exists($pathToUpload.$store_image)){
             @unlink($pathToUpload.$store_image);
         }
     }
}
