<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import_Product;
use App\TypeProduct;
use App\Product;
use File;
use Illuminate\Support\Facades\Input;
class ImportController extends Controller
{
    //
    public function getProduct()
    {
    	$imports = Import_Product::findAllImportPorduct()->get(); 
    	
    	return view('Manager.backend.warehouse.listware',['imports'=>$imports]);
    }

    public function getAdd()
    {	
    	$id = Import_Product::findNewIdforImportProduct();
        $types = TypeProduct::findTypeProductByIdPar()->get();
    	return view('Manager.backend.warehouse.addnew',['id'=>$id,'types'=>$types]);
    }
    public function postAdd(Request $request) {
        $fileName = "";
         if (Input::file('image')->isValid()) 
            {
                $fileName = Input::file('image')->getClientOriginalName();
                Input::file('image')->move(base_path().'/public/images/',$fileName);
            }
        Product::add($request->name_product,$request->description,$request->type,$request->type_child,$request->sale_price,$request->Materia,$request->size,$fileName);
        Import_Product::add($request->id_product,$request->name_product,$request->import_price,$request->import_quantity);

        return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
    }
}
