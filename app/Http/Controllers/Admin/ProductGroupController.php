<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGroup\StoreRequest;
use App\Http\Requests\Admin\ProductGroup\UpdateRequest;
use App\Http\Resources\ProductGroup\ProductGroupResource;
use App\Models\ProductGroup;
use App\Services\ProductGroupService;
use Symfony\Component\HttpFoundation\Response; // для destroy()

class ProductGroupController extends Controller
{
    public function __construct(
        private readonly ProductGroupService $service
    ) {}

    public function index()
    {
        $productGroups = ProductGroupResource::collection(ProductGroup::all())->resolve();
        return inertia('Admin/ProductGroup/Index', compact('productGroups'));
    }

    public function create()
    {
        return inertia('Admin/ProductGroup/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $productGroup = $this->service->store($data);
        return ProductGroupResource::make($productGroup)->resolve();
    }

    public function show(ProductGroup $productGroup)
    {
        $productGroup = ProductGroupResource::make($productGroup)->resolve();
        return inertia('Admin/ProductGroup/Show', compact('productGroup'));
    }

    public function edit(ProductGroup $productGroup)
    {
        $productGroup = ProductGroupResource::make($productGroup)->resolve();
        return inertia('Admin/ProductGroup/Edit', compact('productGroup'));
    }

    public function update(UpdateRequest $request, ProductGroup $productGroup)
    {
        $data = $request->validated();
        $productGroup = $this->service->update($productGroup, $data);
        return ProductGroupResource::make($productGroup)->resolve();
    }

    public function destroy(ProductGroup $productGroup)
    {
        $productGroup->delete();
        return response()->json(['message' => 'success'], Response::HTTP_OK);
    }
}
