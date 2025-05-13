<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Category extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = "categories";
    protected $guarded = ["id"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function hotProducts()
    {
        return $this->hasMany(Product::class)->where('is_hot', true);
    }


}
