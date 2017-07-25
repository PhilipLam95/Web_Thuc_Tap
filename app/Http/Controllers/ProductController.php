<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    //
    public function getTypeProDuct($id)
    {
    	$products = Product::findTypeProDuct($id)->where('status_pro',1)->paginate(6);// lấy sản phẩm theo lo

    	$categories = Product::findCategoyy($id)->first();//lay ra san pham theo  loai noi that

       
    	return view('pages.type_product',['products'=>$products,'categories'=>$categories]);
    }

    public function getTypeProDuctByIdPar($id)// lay san pham theo phong`
    {
    	$products = Product::findProductByIdPar($id)->where('status_pro',1)->paginate(6);
    	$categories = Product::findCategoyy($id)->first();    
    	return view('pages.type_product',['products'=>$products,'categories'=>$categories]);
    }

     /// Trang quan tri
    public function getProduct()
    {
        $products = Product::FindAllProductAdmin()->get();
        $typechilds = TypeProduct::findTypeProductChild()->get(); // tìm các loại sản phẩm  
        $types = TypeProduct::findTypeProductByIdPar()->get();// tìm sản phẩm theo nội thất
       
        return view('Manager.backend.products.list_product',['products'=>$products,'typechilds'=>$typechilds,'types'=>$types]);
    }

    public function postAdd(Request $request)
    {
         $rules = [
            'new_name' =>'required|unique:products,name',
            'id_type'=>'required',
            'unit_price'=>'required',
            'image'=>'required'
        ];

        $messages = [
            'name.required'=> '<div><strong  style="color: red;">Vui lòng nhập tên sản phẩm </strong></div>',
            'id_type.required'=> '<div><strong  style="color: red;">Vui lòng chọn loại sản phẩm</strong></div>',
             'unit_price.required'=> '<div><strong  style="color: red;">Vui lòng chọn loại sản phẩm</strong></div>',
              'image.required'=> '<div><strong  style="color: red;">Vui lòng chọn loại sản phẩm</strong></div>'          
        ];

    }

    public function acceptProduct($id)
    {
        Product::acceptProducts($id);
        return redirect('dashboard/list_products')->with('thanhcong','Xác nhận bán sản phẩm thành công');
    }

    public function unacceptProduct($id)
    {
        Product::unacceptProducts($id);
         return redirect('dashboard/list_products')->with('thanhcong','Hủy bán sản phẩm thành công');
    }

    public function remove($id) {   
        $images = Product::findImages($id);
        foreach ($images as $image) 
        {
            File::delete('public/images/'.$image->image);
        }
        $sanpham = Product::remove($id);
        return redirect('dashboard/product')->with(['flash_level'=>'success','flash_message'=>'Xóa sản phẩm thành công!!!']);
    }


    
}
