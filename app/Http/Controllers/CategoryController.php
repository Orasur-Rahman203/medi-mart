<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Image;

class CategoryController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $categories=Category::paginate(4);
        return view ('backend.category_details.category_index',compact('categories'));
    }

    public function create(){
        return view ('backend.category_details.category_create');
    }

    public function store(CategoryRequest $request){
           try{
      
        $data=$request->all();
        if($request->category_image){
            $image=$this->UploadImage($request->category_name,$request->category_image);
        }
       
        $data['category_image']=$image;
      
        Category::create($data);
        return redirect()->route('category_index');
       }
       catch(Exception $e){
        return redirect()->route('category_create')->withMessage($e->getMessage());
       }
    }

    public function edit($id){
        $category=Category::find($id);
        return view ('backend.category_details.category_edit',compact('category'));
    }

    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');

            if($request->hasFile('category_image')){
                $category=Category::where('id',$id)->first();
                $this->unlink($category->category_image);
                $data['category_image']=$this->UploadImage($request->category_name,$request->category_image);
            }
            Category::where('id', $id)->update($data);
            return redirect()->route('category_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }

     //Individual post delete
     public function delete($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back();
        
    }

    //Image upload function
    public function UploadImage($category_name,$category_image){
        $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
        $file_name=$timestamp . '-'.$category_name. '.' .$category_image->getClientOriginalExtension();
        $pathToUpload=storage_path().'/app/public/categories/';
 
        if(!is_dir($pathToUpload)){
         mkdir($pathToUpload, 0755, true);
 
        }
        Image::make($category_image)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
     }
 
     //Image update then previous image delete in storage folder
     private function unlink($category_image){
         $pathToUpload=storage_path().'/app/public/categories/';
         if($category_image != '' && file_exists($pathToUpload.$category_image)){
             @unlink($pathToUpload.$category_image);
         }
     }
}
