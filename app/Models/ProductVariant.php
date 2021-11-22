<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'variant_name', 'variant_category', 'variant_value'];

    public function stocks()
    {
        return $this->hasOne(ProductVariantStocks::class,'id','variant_id');
    }
}
