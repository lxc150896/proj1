<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = [
        'bill_id',
        'status',
        'note',
    ];

    public function bill()
    {
        return $this->belongTo('App\Models\Bill', 'bill_id', 'id');
    }
}
