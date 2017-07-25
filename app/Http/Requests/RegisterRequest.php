<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return
        [
            'email' =>'required|unique:users,email',
            'full_name'=>'required',
            'phone'=>'numeric',
            'password'=>'required|min:9|max:11',
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password'
        ];  
    }

    public function messages() {
        return [
             'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email nay đã có người sử dụng',
            'phone.numeric'=>'Điện thoại phải thuộc kiểu số',
            'phone.min'=>'SDT ít nhất 9 kí tự',
            'phone.max'=>'SDT nhiều nhất 11 kí tự',
            'password.redirect'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',

             're_password.same'=>'Mật khẩu không giống nhau'
        ];
    }
}
