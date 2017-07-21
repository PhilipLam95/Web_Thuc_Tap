<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getlogin()
    {
    	return view('pages.login');
    }

    public function Register()
    {
    	return view('pages.register');
    }

    public function postRegister(Request $req)
    {
    	$this->validate($req,
            [
               'email' =>'required|unique:users,email',
                'full_name'=>'required',
                'phone'=>'numeric',
                'phone'=>'required|min:9|max:11',
                'password'=>'required|min:6|max:20',
                're_password'=>'required|same:password',
                'number_account'=>'numeric',
                'type_account'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email nay đã có người sử dụng',
                'phone.numeric'=>'Điện thoại phải thuộc kiểu số',
                'phone.min'=>'Điện thoại '
                'password.redirect'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu ít nhất 20 kí tự',
                're_password.same'=>'Mật khẩu không giống nhau'
            ]
            
        );
    }
}
