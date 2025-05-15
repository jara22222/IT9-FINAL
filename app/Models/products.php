<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'pid';
    
    protected $fillable = [
        'product_name',
        'ptid',
        'sid',
        'product_desc',
        'price',
        'stock',
        'image',
        
        
    ];
    public function scopeLowStock($query)
    {
        return $query->where('stock', '<', 10);
    }
    public function suppliers()
    {
        return $this->belongsTo(Suppliers::class, 'sid', 'sid');
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'ptid', 'ptid');
    }
    public function orderde_items()
    {
        return $this->hasMany(Ordered_items::class, 'pid', 'pid');
    }
}