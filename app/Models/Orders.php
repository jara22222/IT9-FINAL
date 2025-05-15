<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Orders extends Model
{
    protected $primaryKey = 'oid';
    protected $fillable = [
        'eid',
        'total',
        'p_type',
    ];

    public function employees(){
        return $this-> belongsTo(Employees::class, 'eid', 'eid');
    }
    public function ordered_items(){
        return $this-> hasMany(Ordered_items::class, 'oid', 'oid');
    }
    
}