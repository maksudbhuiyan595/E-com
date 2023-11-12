<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function index()
   {
    $users = User::all();
    return view("backend.layouts.users.index", compact("users"));

   }
   public function create()
   {
    $roleNames = Role::all("id","name");
   
    return view("backend.layouts.users.create", compact('roleNames'));
   }
   public function store(Request $request)
   {
   
    //    dd($request->all());
      $validator = Validator::make($request->all(), [
        'fname'=> 'required',
        'lname'=> 'required',
        'email'=> 'required |unique:users',
        'password'=> 'required |string |min:6',
        'mobile'=> 'required |string',
        'gender'=> 'required',
        'date'=> 'required |date',
        'role_id'=> 'required',
        'role'=> 'required |numeric',
        // 'image'=> 'required',
        'address'=> 'required |min:10',
      ]);
      if ($validator->fails())
      {
        toastr()->error($validator->getMessageBag());
        return redirect()->back();
      }

    //   $fileName= null;
    //   if($request->hasfile('image')){
    //       $image=$request->file('image');
    //       $fileName=date('Ymdhsi').'.'.$image->getClientOriginalExtension();
    //       $image->storeAs('/users',$fileName);
    //   }

    //  dd($fileName);
      
    $user = User::create([
        'first_name'=> $request->fname,
        'last_name'=> $request->lname,
        'email'=> $request->email,
        'password'=> bcrypt($request->password),
        'role_id'=> $request->role_id,
        'role'=> $request->role,
        'gender'=> $request->gender,
        'date_of_birth'=> $request->date,
        'mobile'=> $request->mobile,
        'address'=> $request->address,
        ]);
        
        toastr()->success('successfully created user');
        return redirect()->route('user.index');
   }
}
