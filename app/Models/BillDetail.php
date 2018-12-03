<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongTo('App\Models\Product', 'product_id', 'id');
    }

    public function bill()
    {
        return $this->belongTo('App\Models\Bill', 'bill_id', 'id');
    }
}
