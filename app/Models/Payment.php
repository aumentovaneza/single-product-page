<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'amount',
        'customer_name',
        'customer_address',
        'customer_email_address',
        'isSuccessful'
    ];
}
