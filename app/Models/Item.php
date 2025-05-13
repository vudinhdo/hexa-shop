<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $guarded = ["id"];
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,"item_product","cart_id","product_id")
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
