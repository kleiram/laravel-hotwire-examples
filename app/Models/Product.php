<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'productcode',
        'amount',
        'amount_ordered',
    ];

    protected $attributes = [
        'amount' => 0,
        'amount_ordered' => 0,
    ];

    public function productBarcodes(): HasMany
    {
        return $this->hasMany(ProductBarcode::class);
    }
}
