<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        parent::__construct($productRepository);
        $this->productRepository = $productRepository;
    }

    public function gerAllProducts()
    {
        return $this->repository->all();
    }

    public function getProductsByCategory($categoryId)
    {
        return $this->repository->getProductsByCategory($categoryId);
    }
}
