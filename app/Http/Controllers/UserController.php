<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller{
    
    // Function to get all the users with optional parameter(id)
    public function getAllUsers($id = null){
        if($id != null){
            $users = User::where('user_id','=',$id)->get();
        }else{
        $users = User::all();    
        }

        return response()->json([
            "status" => "Success",
            "users" => $users
        ], 200);
    }

}
