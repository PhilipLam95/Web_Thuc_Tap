<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Cart;
use App\TypeProduct;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
   

    public function getIndex()
   {
      $slides= Slide::showslide()->orderBy('id','DESC')->limit(5)->get();// slider
      $products = Product::getProducts()->limit(6)->get();// lấy 6 sản phẩm mới nhất
      $best_pros = Product:: findProDuctBestSale()->limit(8)->get();// lấy 8 sản 1phẩm bán nhiều nhất
      $best_views = Product::findProducBestFeature()->limit(10)->get();
      return view('pages.home',['slides'=>$slides,'products'=>$products,'best_pros'=>$best_pros,'best_views'=>$best_views]);
  }
  public function getContact()
  {
    return view('pages.contact');
  }
   
   public function getIntroduce()
   {
      return view('pages.introduce');
   }
   public function getProduct()
   {
      $all_pros = Product::findAllProduct()->paginate(9);
      $type_childs = TypeProduct::findTypeProductChild()->get();
      return view('pages.product',['all_pros'=>$all_pros,'type_childs'=>$type_childs]);
   }
   public function getDetail($id)
   {
     
      $products =Product::findProDuctById($id)->first();
      return view('pages.detail',['products'=>$products]);
   }

   public function getFind(Request $request)
   {
      $keyword = Input::get("keyword");
      $products = Product::SearchProduct($keyword)->paginate(9);
      // $products = Product::SearchProduct($request->keyword);
      // $products->appends('keyword' => $keyword);
      return view('pages.search',['products'=>$products]);
   }


   public function postFind(Request $request)
   {
      $queryString = '/search?keyword='.$request->keyword;
      return redirect($queryString);
   }

   public function checkout()
   {
   
      if(Session::has('cart'))
        {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('pages.checkout',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);

         }
      else
      {
        return view('pages.checkout');
      }
   }

   public function postCheckout(Request $req)
   {
        $cart = Session::get('cart');

            $customer=Customer::where('email',$req->email)->first();
                  if($customer)
                  {
                    
                  }
                  else
                  {
                    $customer= new Customer;
                    $customer->full_name=$req->full_name;
                    $customer->email=$req->email;
                    $customer->address=$req->address;
                    $customer->phone=$req->phone;
                    $customer->save();
                  }
                  $bill = new Bill;
                  $bill->id_customer = $customer->id;
                  $bill->status = 1;
                  $bill->method = $req->PaymentMethodId;
                  $bill->note = $req->note;
                  $bill->save();

                  foreach($cart->items as $key=>$value)
                  {
                    $bill_detail = new BillDetail;
                    $bill_detail->id_bill = $bill->id;
                    $bill_detail->id_product = $key;//$value['item']['id'];
                    $bill_detail->quantity = $value['qty'];
                    $bill_detail->sales_price = $value['price'];
                    $bill_detail->save();
                  }
        Session::forget('cart');
        return  redirect()->back()->with('thanhcong',"Đặt hàng thành công");
     
            
            
       
   }



}
