<?php

namespace App\Http\Controllers;

use App\Models\SiteAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiteAdminController extends Controller
{
    public  function index(){
        return view('site.auth.login');
    }
    public  function dashboard(){
        return view('site.index');
    }
    public  function login(Request $request){
        $check = $request->all();
        if(Auth::guard('site')->attempt(['email' => $check['email'] , 'password' => $check['password'] , 'status' => 1])){
            return redirect()->route('site')->with('error' , 'Admin Login Successfully');
        }else{
            return back()->with('error' , 'Invalid');
        }
    }

    public  function SiteRegister(){
        return view('site.auth.register');
    }
    public  function SiteRegisterCreate(Request $request){
        SiteAdmin::insert([
                'name' => $request->name,
                'email'  => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('login_form')->with('error' , 'Admin Created Successfully');
    }
  public function siteLogout(){
        Auth::guard('site')->logout();
        return redirect()->route('login_form')->with('error' , 'Admin Logout Successfully');
  }
}
