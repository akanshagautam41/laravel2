<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    function index(){
        return view("index");
    }
   
    function login(){
        return view("login");
    }
    function loginUser(Request $data){
       $user = User::where('email',$data->email)->where('password',$data->password)->first();

       if($user)
       {
        session()->put('id',$user->id);
        session()->put('type',$user->type);

if($user->type == 'Customer')
{
return redirect('/');
}
       }
       else{
        return redirect('/login')->with('error','Email/password is incorrect....!');
       }
    }

    function logout(){
        session()->forget('id');
        session()->forget('type');

        return redirect('/');
    }
    function register(){
        return view("register");
    }
    function registerUser(Request $data){
        $newUser = new User();

      $newUser->fullname =  $data->input('fullname');
      $newUser->email =  $data->input('email');
      $newUser->password =   $data->input('password');
      $newUser->picture =   $data->file('file')->getClientOriginalName();
      $newUser->type ='Customer';
      $data->file('file')->move('public/assets/uploads',$newUser->picture);
    
    if($newUser->save())
    {
        return redirect('/login')->with('success','welcome user....!');
    }
    
    }
}
