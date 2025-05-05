<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $primaryKey = 'rid';

    protected $fillable = ['roles'];

    public function users()
    {
        return $this->hasMany(User::class, 'rid', 'rid');
    }
}