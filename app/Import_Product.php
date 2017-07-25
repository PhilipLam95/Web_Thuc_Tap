<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Product;


class Import_Product extends Model
{
    protected $table = "import_product";
    protected $fillable = ['id','id_product','import_price','import_quantity','created_at'];


    public static function findAllImportPorduct()
    {
    	$import = DB::table('import_product')->orderBy('id','desc');
    	return $import;
    }

    public static function findNewIdforImportProduct()// id san pham  mới vào kho
    {
    	$import=DB::table('products')->max('id');
    	$import = $import +1;
    	return $import;
    }

    public static function add($id_product,$name_product,$import_price,$import_quantity) {


    	$import = new Import_Product;
        $import->id_product = $id_product;
       	$import->Name_Product = $name_product;
       	$import->import_price = $import_price;
       	$import->import_quantity = $import_quantity;
        $import->save();
        return $import->id;
    }
}
