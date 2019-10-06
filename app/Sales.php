<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sales extends Model
{
    //
    public function sales(){
        return $this->hasMany('App\Sales');//subject to review
    }


    protected $fillable = [
        'id',
        'productid',
        'category_id',
        'quantity',
        'salesType'
    ];
}
