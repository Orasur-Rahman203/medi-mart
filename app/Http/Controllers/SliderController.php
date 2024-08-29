<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;

class SliderController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $sliders=Slider::paginate(4);
        return view ('backend.slider_details.slider_index',compact('sliders'));
    }

    public function create(){
        return view ('backend.slider_details.slider_create');
    }

    public function store(SliderRequest $request){
           try{
      
        $data=$request->all();
        if($request->slider_image){
            $image=$this->UploadImage($request->slider_name,$request->slider_image);
        }
       
        $data['slider_image']=$image;
      
        Slider::create($data);
        return redirect()->route('slider_index');
       }
       catch(Exception $e){
        return redirect()-route('slider_create')->withMessage($e->getMessage());
       }
    }

    public function edit($id){
        $slider=Slider::find($id);
        return view ('backend.slider_details.slider_edit',compact('slider'));
    }

    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');

            if($request->hasFile('slider_image')){
                $slider=Slider::where('id',$id)->first();
                $this->unlink($slider->slider_image);
                $data['slider_image']=$this->UploadImage($request->slider_name,$request->slider_image);
            }
            Slider::where('id', $id)->update($data);
            return redirect()->route('slider_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }

     //Individual post delete
     public function delete($id){
        $data=Slider::find($id);
        $data->delete();
        return redirect()->back();
        
    }

    //Image upload function
    public function UploadImage($slider_name,$slider_image){
        $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
        $file_name=$timestamp . '-'.$slider_name. '.' .$slider_image->getClientOriginalExtension();
        $pathToUpload=storage_path().'/app/public/sliders/';
 
        if(!is_dir($pathToUpload)){
         mkdir($pathToUpload, 0755, true);
 
        }
        Image::make($slider_image)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
     }
 
     //Image update then previous image delete in storage folder
     private function unlink($slider_image){
         $pathToUpload=storage_path().'/app/public/sliders/';
         if($slider_image != '' && file_exists($pathToUpload.$slider_image)){
             @unlink($pathToUpload.$slider_image);
         }
     }
}
