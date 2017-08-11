<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
use App\Customer;

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




    public function ListEmployee()
    {
        $employees =User::where('group',1)->get();
        return view('Manager.backend.employee.list',['employees'=>$employees]);
    }

    public function getAddEmployee()
    {
        return view('Manager.backend.employee.add');
    }

    public function postAddEmployee(Request $request)
    {
        $name = $request->full_name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $user=User::where('email',$email)->first();
        if($user)
            return redirect()->back()->with('thatbai','Email đã tồn tại');
        else
        {
            $user = new User();
            $user->full_name = $name;
            $user->email = $email;
            $user->password = Hash::make('123');
            $user->phone = $phone;
            $user->address = $address;
            $user->active = 1;
            $user->group = 1;
            $user->remember_token = csrf_token();
            $user->save();

        }
         return redirect()->back()->with('thanhcong','Tạo tài khoản nhân viên thành công');


    }

    public function getUpdateEmployee($id)
    {
        $users = User::where('id',$id)->first();
        return view('Manager.backend.employee.update',['users'=>$users]);
    }

     public function postUpdateEmployee($id,Request $req)
    {
        if(Auth::check())
        {
            if(Auth::user()->group == 1)
            {
                $name = $req->full_name;
                $email = $req->email;
                $oldpass = $req->old_password;
                $password = $req->password;
                $phone = $req->phone;
                $address= $req->address;
                $user=User::where('id',$id)->get();
                $user = $user[0]->email;
                if($user == $email )
                {
                        if(Auth::attempt(['password'=>$oldpass,'id'=>$id]))
                        {
                            User::where('id',$id)
                                            ->update([
                                                    'full_name'=>$name,
                                                    'password'=>Hash::make($password),
                                                    'phone'=>$phone,
                                                    'address'=>$address
                                                    ]);
                            return redirect()->back()->with('thanhcong','Sửa tài khoản thành công');
                        }
                        else
                        {
                            return redirect()->back()->with('error_password','Mật khẩu ban Nhập không chính xác');   
                        }
                }
                else
                {
                    $emails=User::where('email',$email)->first();
                    if($emails)
                    {
                        return redirect()->back()->with('thatbai','Email đã tồn tại');
                    }
                    else
                    {
                        if(Auth::attempt(['password'=>$oldpass,'id'=>$id]))
                        {
                            User::where('id',$id)
                                            ->update([
                                                    'full_name'=>$name,
                                                    'email'=>$email,
                                                    'password'=>Hash::make($password),
                                                    'phone'=>$phone,
                                                    'address'=>$address
                                                    ]);
                            return redirect()->back()->with('thanhcong','Sửa tài khoản thành công');
                        }
                        else
                        {
                            return redirect()->back()->with('error_password','Mật khẩu ban Nhập không chính xác');   
                        }
                    }
                }
            }
            if(Auth::user()->group == 2)
            {
                
                 User::where('id',$id)
                                ->update([
                                          'group'=>2
                                        ]);
                        return redirect()->back()->with('thanhcong','Sửa tài khoản thành công');
            }

        }
            
    }

    public function ListAdmin()
    {
         $admins =User::where('group',2)->get();
        return view('Manager.backend.admin.list',['admins'=>$admins]);
    }

     public function getAddAdmin()
    {
        return view('Manager.backend.admin.add');
    }

    public function postAddAdmin(Request $request)
    {
        $name = $request->full_name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $user=User::where('email',$email)->first();
        if($user)
            return redirect()->back()->with('thatbai','Email này đã tồn tại');
        else
        {
            $user = new User();
            $user->full_name = $name;
            $user->email = $email;
            $user->password = Hash::make('123');
            $user->phone = $phone;
            $user->address = $address;
            $user->active = 1;
            $user->group = 2;
            $user->remember_token = csrf_token();
            $user->save();

        }
        return redirect()->back()->with('thanhcong','Tạo tài khoản admin thành công');

    }

     public function getUpdateAdmin($id)
    {
         $users = User::where('id',$id)->first();
        return view('Manager.backend.admin.update',['users'=>$users]);
    }

    public function postUpdateAdmin($id,Request $req)
    {
          if(Auth::user()->group == 2)
            {
                 
                $name = $req->full_name;
                $email = $req->email;
                $oldpass = $req->old_password;
                $password = $req->password;
                $phone = $req->phone;
                $address= $req->address;
                $user=User::where('id',$id)->get();
                $user = $user[0]->email;
                if($user == $email )
                {
                        if(Auth::attempt(['password'=>$oldpass,'id'=>$id]))
                        {
                            User::where('id',$id)
                                            ->update([
                                                    'full_name'=>$name,
                                                    'password'=>Hash::make($password),
                                                    'phone'=>$phone,
                                                    'address'=>$address
                                                    ]);
                            return redirect()->back()->with('thanhcong','Sửa tài khoản thành công');
                        }
                        else
                        {
                            return redirect()->back()->with('error_password','Mật khẩu ban Nhập không chính xác');   
                        }
                }
                else
                {
                    $emails=User::where('email',$email)->first();
                    if($emails)
                    {
                        return redirect()->back()->with('thatbai','Email đã tồn tại');
                    }
                    else
                    {
                        if(Auth::attempt(['password'=>$oldpass,'id'=>$id]))
                        {
                            User::where('id',$id)
                                            ->update([
                                                    'full_name'=>$name,
                                                    'email'=>$email,
                                                    'password'=>Hash::make($password),
                                                    'phone'=>$phone,
                                                    'address'=>$address
                                                    ]);
                            return redirect()->back()->with('thanhcong','Sửa tài khoản thành công');
                        }
                        else
                        {
                            return redirect()->back()->with('error_password','Mật khẩu ban Nhập không chính xác');   
                        }
                    }
                }
            }
    }


    public function ListCustomer()
    {
        $customers =Customer::all();
        return view('Manager.backend.customer.list',['customers'=>$customers]);
    }
    /*public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index()
    //{
    //    return view('Manager.backend.home');
   // }$2y$10$/sW/MnnoICk03R4I3hU3eut2AVeXe5o0w66q2jZuS.VeoJ7nFDwL6 

}
