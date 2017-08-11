<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use File;
use Illuminate\Support\Facades\Input;
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

    public function countRedisualQty($id) // lay so luong con lai trong kho hang
    {
        $products = Product::findRedisualQty($id)->get();
        return response()->json($products); 

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
            File::delete('public/images/'.$image->image2);
            File::delete('public/images/'.$image->image3);
        }
        $sanpham = Product::remove($id);
        return redirect('dashboard/list_products')->with(['flash_level'=>'success','flash_message'=>'Xóa sản phẩm thành công!!!']);
    }

    public function getUpdate($id)
    {
        $types = TypeProduct::findTypeProductByIdPar()->get();// tìm sản phẩm theo nội thất
        $products = Product::findProdutwithId($id)->first();
        $type_cha = TypeProduct::findOne($products->parent_id)->id;
       
        return view('Manager.backend.products.update_product',['products'=>$products,'types'=>$types,'type_cha'=>$type_cha]);
    }

    public function postUpdate($id,Request $request)
    {
            $name = $request->name;
            $type = $request->type;
            $type_child = $request->type_child;
            $description = $request->description;
            $sale_price = $request->sale_price;
            $materia = $request->Materia;
            $size = $request->size;
       
                  
            Product::edit($id,$name,$type,$type_child,$description,$sale_price,$materia,$size);
            if (!is_null(Input::file('image')) && Input::file('image')->isValid()) 
            {
                File::delete('images/'.$request->currentImage);
                $fileName = Input::file('image')->getClientOriginalName();
                Input::file('image')->move(base_path().'images/',$fileName);
                Product::addImage($id,$fileName);
            }
            if (!is_null(Input::file('image2')) && Input::file('image2')->isValid())
             {
                File::delete('images/'.$request->currentImage2);
                $fileName2 = Input::file('image2')->getClientOriginalName();
                Input::file('image2')->move(base_path().'images/',$fileName2);
                Product::addImage2($id,$fileName2);
            }
            if (!is_null(Input::file('image3')) && Input::file('image3')->isValid()) 
            {
                File::delete('images/'.$request->currentImage3);
                $fileName3 = Input::file('image3')->getClientOriginalName();
                Input::file('image3')->move(base_path().'images/',$fileName3);
                Product::addImage3($id,$fileName3);
            }
   
        
       
        return redirect('dashboard/list_products')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa sản phẩm thành công!!!']);
    }

    public function select_product($id)
    {
        $products = Product::findproduct($id)->get();
        return response()->json($products); 
        
    }
 


    
}
