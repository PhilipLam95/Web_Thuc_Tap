<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class News extends Model
{
     protected $table='news';
    public $timestamps = true;

    public  static function ShowNewPost(){
        $news=DB::table('news')->limit(5)->orderBy('id','DESC')->select();
        return $news;
    }
}
