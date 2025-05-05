<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_addresses extends Model
{
    protected $table = 'employee_addresses';
    protected $primaryKey = 'eadid';
    protected $fillable = [
        'eadid',
        'street',
        'city',
        'province',
        'zip',
    ];

    public function employees()
    {
        return $this->belongsTo(Employees::class, 'eadid', 'eadid');
    }
    
}