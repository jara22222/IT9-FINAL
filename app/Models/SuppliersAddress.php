<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppliersAddress extends Model
{
    use HasFactory;

    protected $foreignKey = 'sid';
    protected $primaryKey = 'bid';
    protected $fillable = ['sid',
    'branch'];

    
    public function supplier(){
        return $this->hasMany(Suppliers::class,'sid','sid');
    }

}