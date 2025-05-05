<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $primaryKey = 'ptid';
    protected $table = 'categories';
    protected $fillable = ['category_name'];
    public function products()
    {
        return $this->hasMany(products::class, 'ptid', 'ptid');
    }

}