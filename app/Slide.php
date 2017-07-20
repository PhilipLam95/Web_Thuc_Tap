<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Slide extends Model
{
    protected $table = "banner";
    protected $fillable = ['id','hinh','url','postion','id_user'];
    public $timestamps = true;

     public static function showslide() // đua ra slider
    {
    	$slider = DB::table('banner')->where('position',1);
    	return $slider;

    }
}
