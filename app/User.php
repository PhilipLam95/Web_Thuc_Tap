<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'full_name', 'email', 'password','phone','address','remember_token','active','group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = 
    [
        'password', 'remember_token',
    ];

    public static function add($full_name,$email,$phone,$address,$password)
    {
        $user = User::create([
            'full_name' => $full_name,
            'email' => $email,
            'password' => bcrypt($password),
            'phone' => $phone,
            'address' => $address,
            'group' => 0,
            'active' => 0,
            'remember_token'=> csrf_token()
        ]);
       
    }

}
