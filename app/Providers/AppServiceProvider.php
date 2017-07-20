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
