<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
    ];

    // public function orders() {
    //     return $this->hasMany(Order::class, 'cus_id');
    // }
}
