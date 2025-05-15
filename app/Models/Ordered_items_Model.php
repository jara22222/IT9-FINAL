<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordered_items_Model extends Model
{
    protected $table = 'ordered_items';
    protected $primaryKey = 'oid';


    public function orders(){
        // return $this-> belongsTo(class::TransactionModel, 'oid', 'oid');
    }
}