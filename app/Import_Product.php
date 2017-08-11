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

    public static function add($name_product,$import_price,$import_quantity) {
        $x = DB::table('products')->max('id');

    	$import = new Import_Product;
        $import->id_product = $x;
       	$import->Name_Product = $name_product;
       	$import->import_price = $import_price;
        $import->redisual_quantity = $import_quantity;
       	$import->import_quantity = $import_quantity;
        $import->save();
        return $import->id;
    }

    public static function import($id,$import_quantity,$import_price)
    {
        $import_quantity_product = DB::table('import_product')->where('id_product',$id)
                                    ->select('import_quantity')->get();
        $redisual_quantity_product = DB::table('import_product')->where('id_product',$id)
                                    ->select('redisual_quantity')->get();         
        $import_quantity_product=$import_quantity_product[0]->import_quantity;
        $redisual_quantity_product=$redisual_quantity_product[0]->redisual_quantity;


        DB::table('import_product')->where('id_product',$id)
                                ->update([
                                        'import_price' => $import_price,
                                        'import_quantity' => ( $import_quantity_product + $import_quantity), 
                                        'redisual_quantity' =>($redisual_quantity_product + $import_quantity)                          
                                    ]);
    }
}
