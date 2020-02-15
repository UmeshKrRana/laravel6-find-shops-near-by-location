<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function index(Request $request) {

        $latitude       =       "28.418715";
        $longitude      =       "77.0478997";

        $shops          =       DB::table("shops");

        $shops          =       $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" .$latitude. ")) * sin(radians(latitude))) AS distance"));
        $shops          =       $shops->having('distance', '<', 20);
        $shops          =       $shops->orderBy('distance', 'asc');

        $shops          =       $shops->get();

        return view('shop-listing', compact("shops"));
    }


    // ------------ load shop view ---------------
    public function create() {
        return view('create-shop');
    }


    // ----------------- save shop detail ----------------------
    public function store(Request $request) {

        $request->validate([
            "shop_name"     =>  "required",
            "location"      =>  "required",
            "filename"      =>  "required|mimes:jpeg,png,jpg,bmp|max:2048"
        ]);


        if($file            =       $request->file('file')) {
            $image_name         =       time().'.'.$file->getClientOriginalExtension();
            $target_path        =       public_path('/uploads/');

            if($file->move($target_path, $image_name)) {
                $dataArray      =       array (
                    "shop_name"         =>      $request->shop_name,
                    "address"           =>      $request->location,
                    "description"       =>      $request->description,
                    "latitude"          =>      $request->latitude,
                    "longitude"         =>      $request->longitude,
                    "image"             =>      ""
                );

                $shop           =       Shop::create($dataArray);

                if(!is_null($shop)) {
                    return back()->with("success", "Shop details saved successfully");
                }
            }
        }
    }
}
