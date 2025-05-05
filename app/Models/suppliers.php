<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
  
    protected $table = 'suppliers';
    protected $primaryKey = 'sid';
    protected $fillable = [ 'company_name'];


    public function addresses(){
        return $this->belongsTo(SuppliersAddress::class,'sid','sid');
    }

    public function products()
    {
        return $this->hasMany(products::class, 'sid');
    }

}