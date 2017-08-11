<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TypeProduct extends Model
{
    //
     protected $table = "category";
    protected $fillable = ['id','name_type','description','image_type','parent_id'];
    public $timestamps = true;

   public static function getTypeProDuct() // đua ra slider
    {
    	$type = DB::table('category');
    	return $type;

    }

    public static function findTypeProductByIdPar()
    {
    	$type = DB::table('category')->where('category.parent_id',1);
    	return $type;
    }

    public static function findTypeProductChild() // tìm loại sản phẩm có parent_id>1
    {
        $typechild = DB::table('category')->where('category.parent_id','>',1);
        return $typechild;

    }
    //trang quan tri
    public static function findTypeChildByIdPar($id)
    {
        $typechild =DB::table('category')->where('category.parent_id',$id);
        return $typechild;
    }

    public static function findOne($id)
    {
        $loaiSanPhamQuery = DB::table('category')->where('id','=',$id)->first();
        return $loaiSanPhamQuery;
    }


}
