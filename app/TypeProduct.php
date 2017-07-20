<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TypeProduct extends Model
{
    //
     protected $table = "category";
    protected $fillable = ['id','name','description','image','type_cha','parent_id'];
    public $timestamps = true;

   public static function getTypeProDuct() // đua ra slider
    {
    	$type = DB::table('category');
    	return $type;

    }
}
