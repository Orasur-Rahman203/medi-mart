<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;



class SearchController extends Controller
{
    //security
    public function __construct(){
      $this->middleware('auth');
  }

public function medicine_search(Request $request){
  $myOrderItems=Order::where('user_id',auth()->user()->id)->count();
  $myItems=Cart::where('user_id',auth()->user()->id)->count();
  $categories = Category::all();
  $queryName = $request->input('query');
  $medicines = Medicine::where('medicine_name', 'LIKE', "%$queryName%")->get();
  
  $userInfo = @unserialize(file_get_contents("http://ip-api.com/php"));

  $lat = $userInfo['lat'];
  $lon = $userInfo['lon'];
  $query = $userInfo['query'];

  $vendors = [];
  foreach ($medicines as $medicine) {
      $data = [];
      
          $km = $this->calculateDistance($lat, $lon, $medicine->vendor->latitude, $medicine->vendor->longitude);
          
          $vendor_data = [
              'vendor_id' => $medicine->vendor->id,
              'current_km' => ceil($km['kilometers']),
          ];
          
          $data[] = $vendor_data; 
    
      $vendors[] = $data;   
     
  }
 
usort($vendors, function ($a, $b) {
 
  $currentKmA = isset($a['current_km']) ? $a['current_km'] : null;
  $currentKmB = isset($b['current_km']) ? $b['current_km'] : null;

  if ($currentKmA === $currentKmB) {
      return 0;
  }

  return ($currentKmA < $currentKmB) ? -1 : 1;
});

  // dd($vendors[0][0]['vendor_id']);
  return view('frontend.medicine_search_list', compact('medicines', 'queryName', 'categories', 'vendors', 'userInfo', 'query','myOrderItems','myItems'));
}


  function calculateDistance($lat1,$lng1, $lat2, $lng2)
{
  $theta = $lng1 - $lng2;
  $miles = (sin(deg2rad($lat1))) *sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));

  $miles = acos($miles);
  $miles = rad2deg($miles);
  $result['miles'] = $miles * 60 * 1.1515;
  $result['kilometers'] = $result['miles'] * 1.609344;
  return $result;
}

  public function f_medicine_search(Request $request){
  
    $query=$request->input(key: 'query');
    
    $medicines=Medicine::where('medicine_name','LIKE',"%$query%")->get();
    return view('backend.medicine_details.medicine_search_list',compact('medicines','query'));
  }


  public function medicine(Request $request){
    $data=Medicine::where('medicine_name','like','%'.$request->searchItem.'%') ->get();
    return $data;
    }
}