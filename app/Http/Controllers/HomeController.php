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
use App\News;
use App\Support;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Mail;

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

  public function postContact(Request $req)
  {
    $name = $req->full_name;
    $phone = $req->phone;
    $email = $req->email;
    $message = $req->message;
    
      $support = new Support;
      $support->full_name = $name;
      $support->email = $email;
      $support->phone = $phone;
      $support->content = $message;
      $support->save();

    return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Chúng tôi đã nhận được liên hệ của bạn. Chúng tôi sẽ phẩn hồi bạn nhanh nhất có thể.']);
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
            if(Auth::check())
            {
                  $customer=Customer::where('email',Auth::user()->email)->first();
                  if($customer)
                  {
                    
                  }
                  else
                  {
                    $customer= new Customer;
                    $customer->id_user = Auth::user()->id;
                    $customer->full_name=Auth::user()->full_name;
                    $customer->email=Auth::user()->email;
                    $customer->address=Auth::user()->address;
                    $customer->phone=Auth::user()->phone;
                    $customer->save();
                  }
                  $bill = new Bill;
                  $bill->id_customer = $customer->id;
                  $bill->total = $cart->totalPrice;
                  $bill->status = 0;
                  $bill->method = $req->PaymentMethodId;
                  $bill->Address_shipping = $req->address;
                  $bill->phone_customer = $req->phone;
                  $bill->note = $req->note;
                  $bill->save();
            }
            else
            {
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
                  $bill->total = $cart->totalPrice;
                  $bill->status = 0;
                  $bill->method = $req->PaymentMethodId;
                  $bill->Address_shipping = $req->address;
                  $bill->phone_customer = $req->phone;
                  $bill->note = $req->note;
                  $bill->save();

            }
            foreach($cart->items as $key=>$value)
                  {
                    $bill_detail = new BillDetail;
                    $bill_detail->id_bill = $bill->id;
                    $bill_detail->id_product = $key;//$value['item']['id'];
                    $bill_detail->quantity = $value['qty'];
                    $bill_detail->sales_price = $value['price'];
                    $bill_detail->save();
                  }
        // $sends = DB::table('products')->join('bill_detail','products.id','=','bill_detail.id_product')
        //         ->join('bills','bills.id','=','bill_detail.id_bill')
        //         ->join('customer','customer.id','=','bills.id_customer')
        //         ->where('id_bill',$bill->id)->get();

        //  Mail::send('pages.mail',['nguoidung'=>$sends], function ($message) use($sends)
        // {
        //     $message->from('drakaabc456@gmail.com', "StudiO Noi that gô");
        //     $message->to($sends->email,$sends->full_name,$sends->total);
        //     $message->subject('Xác nhận tài khoản');
        // });    
                  
        Session::forget('cart');
        return  redirect()->back()->with('thanhcong',"Đặt hàng thành công");
   }

   public function getnews()
   {
    $news= News::ShowNewPost()->get();
     return view('pages.news',['news'=>$news]);
   }

   public function ViewInform()
   {
    if(Auth::check())
    {
      $customers= Customer::findDetailBillOfUser(Auth::user()->id)->get();
      return view('pages.informCustomer',['customers'=>$customers]);
    }
   }


}
