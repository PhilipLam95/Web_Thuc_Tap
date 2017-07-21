<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    //
    public function getTypeProDuct($id)
    {
    	$products = Product::findTypeProDuct($id)->paginate(6);// lấy sản phẩm theo lo

    	$categories = Product::findCategoyy($id)->first();//lay ra san pham theo  loai noi that

       
    	return view('pages.type_product',['products'=>$products,'categories'=>$categories]);
    }

    public function getTypeProDuctByIdPar($id)// lay san pham theo phong`
    {
    	$products = Product::findProductByIdPar($id)->paginate(6);
    	$categories = Product::findCategoyy($id)->first();    
    	return view('pages.type_product',['products'=>$products,'categories'=>$categories]);
    }
    
}
