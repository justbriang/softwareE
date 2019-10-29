<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{
    protected $table = 'categories';//where data is going to be pulled from
 
    protected $guarded=[];
    public function product(){
        return $this->belongsTo(Product::class); 
       }




}
