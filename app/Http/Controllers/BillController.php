<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use DB;
use App\Customer;
use App\BillDetail;
use App\Product;
use App\Import_Product;
class BillController extends Controller
{
    //
    public function getCountBill()
    {
    	$counts = Bill::countBill();
    	return view('Manager.backend.home',['countbills'=>$counts]);
    }

        public function ListBill()
        {
        	$bills = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')
        	->select('id_customer','full_name','email','method','note','bills.created_at','status','bills.id','Address_shipping','phone_customer',
               'bills.total' )
        	->get();

            $unapproves = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')
            ->select('id_customer','full_name','email','method','note','bills.created_at','status','bills.id','Address_shipping','phone_customer',
               'bills.total' )->where('status',0)->orderBy('id','desc')
            ->get();

            $approves = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')
            ->select('id_customer','full_name','email','method','note','bills.created_at','status','bills.id','Address_shipping','phone_customer',
               'bills.total' )->where('status',1)->orderBy('id','desc')
            ->get();

            $delivered = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')
            ->select('id_customer','full_name','email','method','note','bills.created_at','status','bills.id','Address_shipping','phone_customer',
               'bills.total' )->where('status',3)->orderBy('id','desc')
            ->get();

             $bill_cancels = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')
            ->select('id_customer','full_name','email','method','note','bills.created_at','status','bills.id','Address_shipping','phone_customer',
               'bills.total' )->where('status',4)->orderBy('id','desc')
            ->get();
        	
        	return view('Manager.backend.bill.list',['bills'=>$bills, 'unapproves'=>$unapproves,'approves'=>$approves,'delivered'=>$delivered,'bill_cancels'=>$bill_cancels]);
        }

        public function UpdateBill($id)
        {
            $bill = Bill::where('id',$id)->first();
            $customer = Customer::where('id',$bill->id_customer)->first();
            $bill_details = Bill::findDetailBill($bill->id)->get();
            return view('Manager.backend.bill.update',['bill'=>$bill,'customer'=>$customer,'bill_details'=>$bill_details]);
        }

        public function postUpdateBill($id,Request $request)
        {
            $status = $request->status;
            $name_reciepe = $request->name_reciepe;
            $phone_reciepe = $request->phone_reciepe;
            $email_reciepe = $request->email_reciepe;
            if($status == 1)
            {
                $bill = Bill::where('id',$id)->update(['status'=>$status]);
                $bill_details = BillDetail::where('id_bill',$id)->get();
                
                $count = count($bill_details);

                for($i=0;$i<$count; $i++)
                {

                    $products = Product::where('id',$bill_details[$i]->id_product)->get();
                    $import_products = Import_Product::where('id_product',$bill_details[$i]->id_product)->get();
                    foreach ($products as $product) 
                    {
                        Product::where('id',$bill_details[$i]->id_product)
                                ->update([
                                       'sale_quantity'=>(($product->sale_quantity)+ ($bill_details[$i]->quantity))
                                    ]);
                    }
                    foreach($import_products as $import_product)
                    {
                       
                        Import_Product::where('id_product',$bill_details[$i]->id_product)
                                ->update([
                                        'redisual_quantity'=>(($import_product->redisual_quantity)-($bill_details[$i]->quantity))
                                        ]);
                     }
                    
                }
            return redirect()->route('bill')->with('thanhcong','Sửa hóa đơn thành công');
                
            }
            if($status == 2)
            {
                $bill = Bill::where('id',$id)->update(['status'=>$status]);
                return redirect()->route('bill')->with('thanhcong','Sửa hóa đơn thành công');
            }

             if($status == 3)
            {
                $bill = Bill::where('id',$id)->update(['status'=>$status]);
                return redirect()->route('bill')->with('thanhcong','Sửa hóa đơn thành công');
            }

             if($status == 4)
            {
                $bill = Bill::where('id',$id)->update(['status'=>$status]);
                return redirect()->route('bill')->with('thanhcong','Sửa hóa đơn thành công');
            }


        }

        public function ApproveBill($id)
        {
                Bill::where('id',$id)->update([
                        'status'=>1]);
                $bill_details = BillDetail::where('id_bill',$id)->get();
                
                $count = count($bill_details);

                for($i=0;$i<$count; $i++)
                {

                    $products = Product::where('id',$bill_details[$i]->id_product)->get();
                    $import_products = Import_Product::where('id_product',$bill_details[$i]->id_product)->get();
                    foreach ($products as $product) 
                    {
                        Product::where('id',$bill_details[$i]->id_product)
                                ->update([
                                       'sale_quantity'=>(($product->sale_quantity)+ ($bill_details[$i]->quantity))
                                    ]);
                    }
                    foreach($import_products as $import_product)
                    {
                       
                        Import_Product::where('id_product',$bill_details[$i]->id_product)
                                ->update([
                                        'redisual_quantity'=>(($import_product->redisual_quantity)-($bill_details[$i]->quantity))
                                        ]);
                     }
                }
                 
            return redirect()->route('bill')->with('thanhcong','xác nhận hóa đơn thành công');
        }



        
        public function DeleteBill($id)
        {
            Bill::where('id',$id)->delete();
            return redirect()->route('bill')->with('thanhcong','Xóa hóa đơn thành công');
        }
}
