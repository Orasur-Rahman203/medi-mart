<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Carbon;
use Image;

class CompanyController extends Controller
{
     //security
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $companies=Company::paginate(4);
        return view ('backend.company_details.company_index',compact('companies'));
    }

    public function create(){
        return view ('backend.company_details.company_create');
    }

    public function store(CompanyRequest $request){
           try{
      
        $data=$request->all();
        if($request->company_image){
            $image=$this->UploadImage($request->company_name,$request->company_image);
        }
       
        $data['company_image']=$image;
      
        Company::create($data);
        return redirect()->route('company_index');
       }
       catch(Exception $e){
        return redirect()-route('company_create')->withMessage($e->getMessage());
       }
    }

    public function edit($id){
        $company=Company::find($id);
        return view ('backend.company_details.company_edit',compact('company'));
    }

    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');

            if($request->hasFile('company_image')){
                $company=Company::where('id',$id)->first();
                $this->unlink($company->company_image);
                $data['company_image']=$this->UploadImage($request->company_name,$request->company_image);
            }
            Company::where('id', $id)->update($data);
            return redirect()->route('company_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }

     //Individual post delete
     public function delete($id){
        $data=Company::find($id);
        $data->delete();
        return redirect()->back();
        
    }

    //Image upload function
    public function UploadImage($company_name,$company_image){
        $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
        $file_name=$timestamp . '-'.$company_name. '.' .$company_image->getClientOriginalExtension();
        $pathToUpload=storage_path().'/app/public/companies/';
 
        if(!is_dir($pathToUpload)){
         mkdir($pathToUpload, 0755, true);
 
        }
        Image::make($company_image)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
     }
 
     //Image update then previous image delete in storage folder
     private function unlink($company_image){
         $pathToUpload=storage_path().'/app/public/companies/';
         if($company_image != '' && file_exists($pathToUpload.$company_image)){
             @unlink($pathToUpload.$company_image);
         }
     }
}
