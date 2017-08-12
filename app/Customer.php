<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model
{
      protected $table='customer';
       protected $fillable = ['id','full_name','email','address','phone'];



       public static function findDetailBillOfCustomer($id)
		{
			$bills = DB::table('customer')
			->join('bills','customer.id','=','bills.id_customer')
			->join('bill_detail','bill_detail.id_bill','=','bills.id')
			->join('products','products.id','=','bill_detail.id_product')
			->where('customer.id',$id)
			->select('customer.id','customer.full_name','customer.email','bills.Address_shipping','bills.phone_customer','products.name','bill_detail.quantity','bill_detail.sales_price','bills.id','bills.created_at');
										
			return $bills;
		}
}


