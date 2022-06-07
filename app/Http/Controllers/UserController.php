<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    // Function to let the user to sign up
    public function signUp(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;

        $user->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
