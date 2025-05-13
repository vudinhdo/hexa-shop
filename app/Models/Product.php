<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = "products";
    protected $guarded = ["id"];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id");
    }
    /**
     * @return mixed
     */
    public static function paginateProducts(): mixed
    {
        return self::paginate(9);
    }


    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, "item_product", "product_id", "cart_id")
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }



}
