<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view("backend.layouts.auths.login");
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email"=> "required",
            "password"=> "required|min:6",
            ]);
            if ($validator->fails()) 
            {
                toastr()->error($validator->errors()->first());
                return redirect()->back();
            }
           $cridentials=$request->only("email","password");
          if(auth()->attempt($cridentials))
          {
            toastr()->success("successfully login");
            return redirect()->route("dashboard");
          }else
          {
            toastr()->error("invalid authenticate user");
            return redirect()->back();
          }
    }
    public function logout()
    {
        auth()->logout();
        toastr()->success("successfully logout");
        return redirect()->route("login");
    }
}
