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
        $fildName2 ="";
        $fileName3 = "";
         if (Input::file('image')->isValid()) 
            {
                $fileName = Input::file('image')->getClientOriginalName();
                Input::file('image')->move(base_path().'/public/images/',$fileName);
            }
            if (is_null(Input::file('image2')->isValid()) || Input::file('image2')->isValid()) 
            {
                $fileName2 = Input::file('image2')->getClientOriginalName();
                Input::file('image2')->move(base_path().'/public/images/',$fileName2);
            }
             if (is_null(Input::file('image3')->isValid()) || Input::file('image3')->isValid()) 
            {
                $fileName3 = Input::file('image3')->getClientOriginalName();
                Input::file('image3')->move(base_path().'/public/images/',$fileName3);
            }

        Product::add($request->name_product,$request->description,$request->type,$request->type_child,$request->sale_price,$request->Materia,$request->size,$fileName,$fileName2,$fileName3);
        Import_Product::add($request->name_product,$request->import_price,$request->import_quantity);

        return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
    }
}
