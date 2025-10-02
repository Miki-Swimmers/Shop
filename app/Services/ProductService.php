<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): Product
    {
        return product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product->fresh();
    }
}
