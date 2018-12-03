<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'email',
        'password',
        'level',
    ];

    public function scopeUser($query)
    {
        return $query->select(DB::raw('count(email) as email'));
    }
}
