<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProduct;

class CategoryController extends Controller
{
    //
 
		public function typechild($id) 
		{ 
			$id= $id;
			$category = TypeProduct::findTypeChildByIdPar($id)->get(); 
			return response()->json($category); 
		}
	
}
