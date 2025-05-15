<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordered_items extends Model
{


protected $fillable = ['oid', 'pid', 'qty', 'price_at_order'];


    
public function Orders()
{
    return $this->belongsTo(Orders::class, 'oid', 'oid');
}

// In Ordered_items model
public function Products()
{
    return $this->belongsTo(Products::class, 'pid', 'pid');
}
}