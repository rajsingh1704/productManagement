<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){

        if($request->method() == 'GET'){
            return view('auth.login');
        } else {
            
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]) == true) {

                return redirect()->intended(route('homePage'));
            } else {

                return redirect()->back()->with('message', 'The email or password is incorrect, please try again!');
            }

        }
    }

    public function register(Request $request){
        if($request->method() == 'GET'){
            return view('auth.register');
        }
    

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'phoneno' => 'required|string|max:10|unique:users',
            'gender' => 'required|in:Male,Female,Other',
            'role' => 'required|in:Admin,Developer,Manager',
        ]);
    
        
        if ($validator->fails()) {
            return response()->json(["statuscode" => '401', "message" => $validator->errors()->first()]);
        }
            $result = new User();
            $result->name=$request->name;
            $result->email=$request->email;
            $result->phoneno=$request->phoneno;
            $result->gender=$request->gender;
            $result->role=$request->role;
            $result->password=Hash::make($request->password);
            $result->save();
            return response()->json(["statuscode" => '200', "message" => 'Account Created Successfully!!' ]);
      

    }
}
