<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Import_Product extends Model
{
    protected $table = "import_product";
    protected $fillable = ['id','id_product','import_price','import_quantity'];
    public $timestamps = true;
}
