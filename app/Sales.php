<?php

namespace App;
use App\Payments;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    }
    protected $guarded=[];
    public function payment(){
        return $this->belongsTo(Payments::class); 
       }
    
}
