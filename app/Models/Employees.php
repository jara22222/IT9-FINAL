<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Employees extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'eid';
    protected $fillable = [
        'eid',
        'eadid',
        'first_name',
        'middle_name',
        'last_name',
        'last_name',
        'age',  
        'gender',
        'birthday',
        'email',
        'phone',
        'status',
    
        
    ];
    public function addresses()
    {
        return $this->hasMany(Employee_addresses::class, 'eadid', 'eadid');
    }
    public function role()
    {
        return $this->belongsTo(Roles::class, 'rid');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'eid', 'eid');
    }

    public function orders(){
        return $this-> hasMany(Orders::class, 'eid', 'eid');
    }

    protected $casts = [
        'birthday' => 'date',
    ];
    
}