<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function ViewProcess()
    {
    	$counts = Bill::countBill();
        return view('Manager.backend.home',['countbills'=>$counts]);
    }

    public function loginManager()
    { 
        if(Auth::check())
            {
            return redirect()->route('process');
            }
        else{  
            return view('loginManager');
            }
    	
    }

    public function postloginManager(Request $req)
    {
    	 if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'active'=>1,'group'=>1]) || (Auth::attempt(['email'=>$req->email,'password'=>$req->password,'active'=>1,'group'=>2]))){
                return redirect()->route('process');
        }
        else{
            return redirect()->back()->with('thatbai','Sai thông tin đăng nhập');
        }
    }
}
