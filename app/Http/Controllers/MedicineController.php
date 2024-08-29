<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MedicineRequest;
use App\Models\Medicine;
use App\Models\Category;
use App\Models\Company;
use App\Models\Vendor;
use Illuminate\Support\Carbon;
use Image;


class MedicineController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $medicines=Medicine::paginate(4);
        return view ('backend.medicine_details.medicine_index',compact('medicines'));
    }

    public function create(){
        $vendors=Vendor::all();
        $companies=Company::all();
        $categories=Category::all();
        return view ('backend.medicine_details.medicine_create',compact('categories','vendors','companies'));
    }

    public function store(MedicineRequest $request){
        try{
     $data=$request->all();
    
     if($request->medicine_image){
         $image=$this->UploadImage($request->medicine_name,$request->medicine_image);
     }
    
     $data['medicine_image']=$image;
     Medicine::create($data);
     return redirect()->route('medicine_index');
    }
    catch(Exception $e){
     return redirect()->route('medicine_create')->withMessage($e->getMessage());
    }
    }

    
    public function edit($id){
        $vendors=Vendor::all();
        $categories=Category::all();
        $medicines=Medicine::find($id);
        $companies=Company::all();
        return view ('backend.medicine_details.medicine_edit',compact('medicines','categories','vendors','companies'));
    }

    public function update(Request $request,$id){
        try{
            $data=$request->except('_token');

            if($request->hasFile('medicine_image')){
                $medicines=Medicine::where('id',$id)->first();
                $this->unlink($medicines->medicine_image);
                $data['medicine_image']=$this->UploadImage($request->medicine_name,$request->medicine_image);
            }
            Medicine::where('id', $id)->update($data);
            return redirect()->route('medicine_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }

        //Individual post delete
        public function delete($id){
            $data=Medicine::find($id);
            $data->delete();
            return redirect()->back();
            
        }


     //Image upload function
     public function UploadImage($medicine_name,$medicine_image){
        $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
        $file_name=$timestamp . '-'.$medicine_name. '.' .$medicine_image->getClientOriginalExtension();
        $pathToUpload=storage_path().'/app/public/medicines/';
 
        if(!is_dir($pathToUpload)){
         mkdir($pathToUpload, 0755, true);
 
        }
        Image::make($medicine_image)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
     }
 
     //Image update then previous image delete in storage folder
     private function unlink($medicine_image){
         $pathToUpload=storage_path().'/app/public/medicines/';
         if($medicine_image != '' && file_exists($pathToUpload.$medicine_image)){
             @unlink($pathToUpload.$medicine_image);
         }
     }
}
