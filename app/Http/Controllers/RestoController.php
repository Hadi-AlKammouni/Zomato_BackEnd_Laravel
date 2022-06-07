<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;

class RestoController extends Controller{
    
    // Function to get all restuarants 
    public function getAllRestos($id = null){
        // echo "Hello World1 !";
        if($id != null){
            $restos = Restaurant::where('restaurant_id','=',$id)->get();
        }else{    
        $restos = Restaurant::all();
        }
        
        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);

    }

    // Function to add a resturant
    public function addResto(Request $request){
        $resto = new Restaurant;

        $resto->restaurant_name = $request->restaurant_name;
        $resto->category = $request->category;
        $resto->description = $request->description;
        $resto->location = $request->location;
        $resto->number = $request->number;
        $resto->total_ratings = $request->total_ratings;

        $resto->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }

    // Function to get restaurants by category
    public function getRestoByCategory($category){
        $resto = Restaurant::where('category','=',$category)->get();
        
        return response()->json([
            "status" => "Success",
            "results" => $resto
        ], 200);
    }

}
