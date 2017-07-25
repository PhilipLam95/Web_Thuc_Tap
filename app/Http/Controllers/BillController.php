<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    public function getCountBill()
    {
    	$counts = Bill::countBill();
    	return view('Manager.backend.home',['countbills'=>$counts]);
    }
}
