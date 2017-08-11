<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProduct;
use File;
use Illuminate\Support\Facades\Input;
use DB;

class CategoryController extends Controller
{
    //
 
		public function typechild($id) 
		{ 
			$id= $id;
			$category = TypeProduct::findTypeChildByIdPar($id)->get(); 
			return response()->json($category); 
		}

		public function listType()
		{
			$big_types = TypeProduct::findTypeProductByIdPar()->get();
			// dd($big_type);
			return view('Manager.backend.big-typeproduct.list',['big_types'=>$big_types]);
		}
		public function getAdd()
		{
			return view('Manager.backend.big-typeproduct.add');
		}
		public function postAdd(Request $request)
		{
			 $fileName = "";
			if (Input::file('image')->isValid()) 
            {
                $fileName = Input::file('image')->getClientOriginalName();
                Input::file('image')->move(base_path().'/public/images/',$fileName);
            }
			$name = $request->name_product;
			$description = $request->description;
			$big_type = new TypeProduct();
	        $big_type->name_type = $name;
	        $big_type->description = $description;
	        $big_type->image_type = $fileName;
	        $big_type->parent_id = 1;
	        $big_type->save();
			return redirect('dashboard/list_bigtype')->with('thanhcong','Thêm nội thất thành công');;
		}

		public function getUpdate($id)
		{
			$big_types = TypeProduct::where('id',$id)->first();
			return view('Manager.backend.big-typeproduct.update',['big_types'=>$big_types]);
		}

		public function postUpdate($id,Request $request)
		{

			$name_type = $request->name_type;
			$description = $request->description;
		

			if ($request->hasFile('image_type')) 
			{
				$image= $request->file('image_type')->getClientOriginalName();
            	$request->file('image_type')->move('images/',$image);
           
            	TypeProduct::where('id',$id)
							->update([
									'name_type'=>$name_type,
									'description'=>$description,
									'image_type'=>$image
									]);
			}
			else
			{
				TypeProduct::where('id',$id)
							->update([
									'name_type'=>$name_type,
									'description'=>$description,
									]);
			}
		
			return redirect()->back()->with('thanhcong','Sửa thành công');
		}

		public function listSmallType()
		{
			$small_types = TypeProduct::where('parent_id','>',1)->get();
			
			return view('Manager.backend.small-type.list',['small_types'=>$small_types]);
		}

		public function getAddsmallType()
		{
			$big_types = TypeProduct::where('parent_id',1)->get();
			return view('Manager.backend.small-type.add',['big_types'=>$big_types]);
		}

		public function postAddsmallType(Request $request)
		{

			$fileName = "";
			if (Input::file('image_type')->isValid()) 
            {
                $fileName = Input::file('image_type')->getClientOriginalName();
                Input::file('image_type')->move(base_path().'/public/images/',$fileName);
            }
			$name_type = $request->name_type;
			$parent_id = $request->type;
			$description = $request->description;

			$small_type = new TypeProduct();
	        $small_type->name_type = $name_type;
	        $small_type->parent_id = $parent_id;
	        $small_type->image_type = $fileName;
	        $small_type->description = $description;
	        $small_type->save();
	        return redirect('dashboard/list_smalltype')->with('thanhcong','Thêm loại sản phẩm thành công');;


		}

		public function getUpdatesmallType($id)
		{
			$small_types = TypeProduct::where('id',$id)->first();
			return view('Manager.backend.small-type.update',['small_types'=>$small_types]);
		}

		public function postUpdatesmallType($id,Request $request)
		{
			$name_type = $request->name_type;
			$description = $request->description;
			if ($request->hasFile('image_type')) 
			{
				$image= $request->file('image_type')->getClientOriginalName();
            	$request->file('image_type')->move('images/',$image);
           
            	TypeProduct::where('id',$id)
							->update([
									'name_type'=>$name_type,
									'description'=>$description,
									'image_type'=>$image
									]);
			}
			else
			{
				TypeProduct::where('id',$id)
							->update([
									'name_type'=>$name_type,
									'description'=>$description,
									]);
			}
			return redirect()->back()->with('thanhcong','Sửa thành công');
		}
	
}
