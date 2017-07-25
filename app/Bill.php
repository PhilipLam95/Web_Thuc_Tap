<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bill extends Model
{
    protected $table='bills';

     protected $fillable = ['id','id_user','id_customer','method','note'];
    public $timestamps = true;

    public static function  countBill()
    {
    	$count = DB::table('bills')->count('bills.id');
    	return $count;
    }

}
