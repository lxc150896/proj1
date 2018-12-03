<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\CustomerScope;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'note',
        'loyal_id',
    ];

    public function bill()
    {
        return $this->hasMany('App\Models\Bill', 'customer_id', 'id');
    }

    public function scopeCustomer($query)
    {
        return $query->join('bills', 'customers.id', '=', 'bills.customer_id')
            ->join('bill_detail', 'bills.id', '=', 'bill_detail.bill_id')
            ->join('status', 'bills.id', '=', 'status.bill_id')
            ->select('name', 'address', 'phone', 'total', 'customers.created_at', 'bills.note', 'bills.total', 'quantity', 'name_product', 'unit_price', 'status.id', 'status.status')
            ->orderBy('customers.created_at', 'desc');
    }
}
