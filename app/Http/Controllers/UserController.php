<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductEditRequest;
use DB;
use File;
use Illuminate\Support\Facades\Input;
use Hash;
use Auth;
use App\User;
use Mail;
use Socialite;
use App\Cart;
use Session;
// use Laravel\Socialite\Facades\Socialite;



class UserController extends Controller
{
    //
   

    public function Register()
    {
    	return view('pages.register');
    }

    public function postRegister(Request $req)
    {   
         $this->validate($req,['email'=>'required|email', 'full_name'=>'required', 'password'=>'required|min:6|max:10', 'phone'=>'required|min:10|max:11', 're_password'=>'required|same:password'
            ],['email.required'=>'Vui lòng nhập Email',
                'email.email'=>'Email không đúng định dạng',
                'phone.numeric'=>'Điện thoại phải thuộc kiểu số',
                'password.redirect'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu tối đa 10 ký tự',
                're_password.same'=>'Mật khẩu không khớp'
            ]);
        $user=User::where('email',$req->email)->first();
        if($user)
            return redirect()->back()->with('thatbai','Email đã tồn tại');
        else
        {
        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->active = 0;
        $user->remember_token = csrf_token();
        $user->save();
        }
        Mail::send('pages.mail',['nguoidung'=>$user], function ($message) use($user)
        {
            $message->from('drakaabc456@gmail.com', "StudiO Noi that gô");
            $message->to($user->email,$user->full_name);
            $message->subject('Xác nhận tài khoản');
        });
        return redirect()->back()->with('thanhcong','Đăng ký thành công, Vui lòng kiểm tra Email');
        
    }

     public function activeUser( $id,$token)
     {
        $user=User::where([
                ['id','=',$id],
                ['remember_token','=',$token]
            ])->first();
        if($user){
            $user->active=1;
            $user->save();
            return redirect()->route('register')->with('thanhcong','Đã kích hoạt tài khoản thành công');
        }
    }

    public function getSignin()
    {
        //Auth:: kiem tra xem  da dang nhap chua
         if(Auth::check())
            {
            return redirect()->route('index');
            }
        else{  
                return view('pages.login');
            }
    }

    public function postSignin(Request $req)
    {
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'active'=>1,'group'=>0])){
                return redirect()->route('index');
        }
        else{
            return redirect()->back()->with('loitruycap','Sai thông tin đăng nhập');
        }
    }


    public function logout()
    {
        Auth::logout();
        Session::forget('cart');
        return redirect()->route('index');
    }


    public function redirectToProvider($providers)
    {
        return Socialite::driver($providers)->redirect();
    }
    public function handleProviderCallback($providers)
    {
      try
      {
          $socialUser = Socialite::driver($providers)->user();
          //return $user->getEmail();
      }
      catch(\Exception $e)
      {
          return redirect()->route('index')->with(['flash_level'=>'danger','thatbai'=>"Đăng nhập không thành công"]);
      }
       $socialProvider = User::where('facebook_id',$socialUser->getId())->first();
       if(!$socialProvider)
       {
          //tạo mới
          $user = User::where('email',$socialUser->getEmail())->first();
          if($user){
            return redirect()->route('index')->with(['flash_level'=>'danger','thatbai'=>"Email đã có người sử dụng"]);
          }
          else{
            $user = new User();
            $user->remember_token = csrf_token();
            $user->facebook_id=$socialUser->getId();
            $user->provider=$providers;
            $user->email = $socialUser->getEmail();
            $user->full_name = $socialUser->getName();
            //if($providers == 'google'){
              // $image = explode('?',$socialUser->getAvatar());
              // $user->avatar = $image[0];
           // }
           // $user->avatar = $socialUser->getAvatar();
            $user->save();
          }
      }
      else
      {
          $user = User::where('email',$socialUser->getEmail())->first();
      }
      Auth()->login($user);
      return redirect()->route('index')->with(['flash_level'=>'success','thanhcong'=>"Đăng nhập thành công"]);
    }

    public function changPasswordCustomer(Request $request)
    {
      if(Auth::check())
      {
        $old_password = $request->old_password;
        $new_password = $request->new_password;

         

          if(Auth::attempt(['password'=>$old_password,'id'=>Auth::user()->id]))
              {
                            User::where('id',Auth::user()->id)
                                            ->update([ 
                                                    'password'=>Hash::make($new_password),
                                                    ]);
              return redirect()->route('informCus')->with('thanhcong','Đổi mật khẩu thành công');
              }
          else
          {
            return redirect()->route('informCus')->with('thatbai','Mật khẩu không đúng');
          }
      }
    }
}

