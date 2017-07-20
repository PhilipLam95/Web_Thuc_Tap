<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','name','id_type','description','unit_price','sale_quantity','image','unit','Material','view','id_par','contact_price'];
    public $timestamps = true;

    public static function getProducts()  // lấy sản phẩm 
    {
    	$products = DB::table('products')->orderBy('id','desc');
    	return $products;

    }

    
    public static function findAllProduct()
    {
        $products = DB::table('products')->leftJoin('import_product','products.id','=','import_product.id_product')
                ->orderBy('products.id','desc');
        return $products;
    }
    public static function getManyNewProducts() //lấy nhiều sản phẩm
    {
    	$products = DB::table('products')->orderBy('id','desc');
    	return $products;
    }

    public static function findProDuctById($id) // chi tiết sản phẩm
    {
        $view = DB::table('products')->where('products.id','=',$id)->select('view')->get();
            $view=$view[0]->view;
            $view = $view +1;

         DB::table('products')->where('products.id','=',$id)->update(['view'=>$view]);
        $products = DB::table('products')->where('products.id','=',$id);
        return $products;
    }

    public static function findProDuctBestSale()
    {
         $products =DB::table('products')->join('import_product','products.id','=','import_product.id_product')
                ->orderBy('products.sale_quantity','desc');
        return $products;
    }

    public static function findProducBestFeature()
    {
        $products =DB::table('products')->join('import_product','products.id','=','import_product.id_product')
                ->orderBy('products.view','desc');
        return $products;

    }
}
