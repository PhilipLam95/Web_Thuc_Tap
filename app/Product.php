<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','name','id_type','description','unit_price','sale_quantity','image','image2','image3','unit','Material','view','id_par',
    'status_pro'];
    public $timestamps = true;

    public static function findRedisualQty($id)// tìm so luong sản phẩm còn theo id cho giỏ hàng
    {
        $products = DB::table('import_product')->where('import_product.id_product','=',$id);
        return $products;
    }


    public static function getProducts()  // lấy sản phẩm  mới 
    {
        $products = DB::table('products')->where('status_pro',1)->orderBy('id','desc');
        return $products;
    }

    
    public static function findAllProduct()
    {
        $products = DB::table('products')->leftJoin('import_product','products.id','=','import_product.id_product')
                ->where('status_pro',1)
                ->orderBy('products.id','desc');
        return $products;
    }
    public static function getManyNewProducts() //lấy nhiều sản phẩm
    {
        $products = DB::table('products')
            ->where('status_pro',1)
            ->orderBy('id','desc');
        return $products;
    }

    public static function findProDuctById($id) // chi tiết sản phẩm->moi khi user nhap xem chi tiet, view +1
    {
        $view = DB::table('products')->where('products.id','=',$id)->select('view')->get();
            $view=$view[0]->view;
            $view = $view +1;

         DB::table('products')->where('products.id','=',$id)->update(['view'=>$view]);
        $products = DB::table('products')->where('products.id','=',$id)
                    ->join('import_product',function($query)
                        {
                            $query->on('products.id','=','import_product.id_product');
                        });
        return $products;
    }

    public static function findProDuctBestSale() //san pham ban chay
    {
         $products =DB::table('products')->join('import_product','products.id','=','import_product.id_product')
                ->where('status_pro',1)
                ->orderBy('products.sale_quantity','desc');
        return $products;
    }

    public static function findProducBestFeature() // san pham noi bat
    {
        $products =DB::table('products')->join('import_product','products.id','=','import_product.id_product')
                ->where('status_pro',1)
                ->orderBy('products.view','desc');
        return $products;

    }

    public static function findCategoyy($id)
    {
         $category = DB::table('category')->where('category.id',$id)->select('id','name_type');
         return $category;
    }

    public static function findTypeProDuct($id)// tim theo loai san pham
    {
        $products = DB::table('products')
        ->join('import_product','products.id','=','import_product.id_product')
        ->leftJoin('category','products.id_type','=','category.id')
        ->where('products.id_type','=',$id);
        return $products;
    }

    public static function findProductByIdPar($id)// tim san pham theo tung phong
    {
        $category = DB::table('category')->where('category.id',$id)->select('id')->get();
        $category = $category[0]->id;
        $products = DB::table('products')->where('products.id_par',$category)
        ->join('import_product','products.id','=','import_product.id_product');
    
        
        return $products;
    }

    public static function SearchProduct($keyword)// tìm san phảm theo từ khóa
    {
         $search = DB::table('products')
            ->where('products.name','like','%'.$keyword.'%')
            ->orWhere('products.id','like','%'.$keyword.'%')
            ->where('products.status_pro',1);
                                      
        return $search;
    }
    

    // trang quản trị

    public static function FindAllProductAdmin()
    {
        $products = DB::table('products')->join('category','products.id_type','=','category.id')
                ->join('import_product','products.id','=','import_product.id_product')
                ->orderBy('id_product','desc');
        return $products;
    }

    public static function add($name_product,$description,$type,$type_child,$sale_price,$Material,$size,$image,$image2,$image3)
    {
        $product = new Product;
        $product->name = $name_product;
        $product->id_type = $type_child;
        $product->description= $description;
        $product->unit_price = $sale_price;
        $product->Materia = $Material;
        $product->id_par = $type;
        $product->size = $size;
        $product->status_pro =0;
        $product->image = $image;
        $product->image2 = $image2;
        $product->image3 = $image3;
        $product->save();
        return $product->id;
    }

    public static function findProdutwithId($id)
    {
         $products = DB::table('products')->join('import_product','products.id','=','import_product.id_product')
                                            ->join('category','products.id_type','=','category.id')
                                        ->where('products.id',$id);    
        return $products;
    }

    public static function acceptProducts($id)
    {
        DB::table('products')
            ->where('id',$id)
            ->update(['status_pro'=>1]);
    }   

     public static function unacceptProducts($id)
    {
        DB::table('products')
            ->where('id',$id)
            ->update(['status_pro'=>0]);
    }

    public static function findImages($id) 
    {
        $images = DB::table('products')->where('id','=',$id)
                    //->select('sanpham.anh_0','sanpham.anh_1','sanpham.anh_2','sanpham.anh_3')
                    ->select('products.image','products.image2','products.image3')
                    ->get();
        return $images;
    }

     public static function remove($id)
    {
        DB::table('products')->where('id','=',$id)->delete();
    }

    public static function edit($id,$name,$type,$type_child,$description,$sale_price,$materia,$size)
    {
      DB::table('products')->where('id',$id)
                    ->update([
                                'name' => $name,
                                'id_type' => $type_child,
                                'description' => $description,
                                'unit_price' => $sale_price,
                                'Materia' => $materia,
                                'id_par' => $type,
                                'size' => $size
                                ]);
        DB::table('import_product')->where('id_product','=',$id)
                                ->update([
                                    'Name_product' => $name
                                    ]);
    }

    public static function addImage($id,$imageName) {
            DB::table('products')->where('id',$id)
                            ->update([
                                'image' => $imageName
                                ]);
    }

    public static function addImage2($id,$imageName) {
            DB::table('products')->where('id',$id)
                            ->update([
                                'image2' => $imageName
                                ]);
    }


    public static function addImage3($id,$imageName) {
            DB::table('products')->where('id',$id)
                            ->update([
                                'image3' => $imageName
                                ]);
    }

    public static function findproduct($id)
    {
        $product = DB::table('products')->join('import_product','products.id','=','import_product.id_product')
                                        ->join('category','products.id_type','=','category.id')
                                        ->where('products.id',$id);
        return $product;
    }
    

    
}
