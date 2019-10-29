<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;

class Payments extends Model
{
    protected $guarded=[];
    public function sales(){
        return $this->belongsTo(Sales::class); 
       }
}
