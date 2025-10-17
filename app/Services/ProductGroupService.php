<?php

namespace App\Services;

use App\Models\ProductGroup;

class ProductGroupService
{
    public function store(array $data): ProductGroup
    {
        return ProductGroup::create($data);
    }

    public function update(ProductGroup $productGroup, array $data): ProductGroup
    {
        $productGroup->update($data);
        return $productGroup->fresh();
    }
}
