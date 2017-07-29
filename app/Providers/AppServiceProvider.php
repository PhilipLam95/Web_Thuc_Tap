<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\TypeProduct;
use App\TypeOfTypeProduct;
use App\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(['header'],function($view){
              $types =  TypeProduct::getTypeProDuct()->get()->toArray();   
              $view->with(['types'=>$types]);
          });

        view()->composer(['pages.menuleft'],function($view)
        {
            $types =  $types = TypeProduct::findTypeProductByIdPar()->get();
            $view->with(['types'=>$types]);
        });

        // view()->composer('pages.type_product',function($view){
        //         $type_chas=TypeProduct::findTypeProductByIdPar()->get();
               
        //         $view->with('type_chas',$type_chas);
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
