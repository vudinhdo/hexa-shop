<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\RepositoryBase;

class ProductRepository extends RepositoryBase implements ProductRepositoryInterface
{
    /**
     * @return string
     */

    public function getModel(): string
    {
        return Product::class;
    }
}
