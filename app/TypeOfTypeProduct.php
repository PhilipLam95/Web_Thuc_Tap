<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TypeOfTypeProduct extends Model
{
    //
    protected $table = "type_category";
    protected $fillable = ['id','name','image','id_type'];
    public $timestamps = true;



}
