<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Param\ParamFilterTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Param\StoreRequest;
use App\Http\Requests\Admin\Param\UpdateRequest;
use App\Http\Resources\Param\ParamResource;
use App\Models\Param;
use App\Services\ParamService;
use Symfony\Component\HttpFoundation\Response;


class ParamController extends Controller
{
    public function __construct(
        private readonly ParamService $paramService
    ) {}

    public function index()
    {
        $params = ParamResource::collection(Param::all())->resolve();
        return inertia('Admin/Param/Index', compact('params'));
    }

    public function create()
    {
        $filterTypes = ParamFilterTypeEnum::Collection();
        return inertia('Admin/Param/Create', compact('filterTypes'));
    }

    public function store(StoreRequest $request)
    {
        $data  = $request->validated();
        $param = $this->paramService->store($data);
        return ParamResource::make($param)->resolve();
    }

    public function show(Param $param)
    {
        $param = ParamResource::make($param)->resolve();
        return inertia('Admin/Param/Show', compact('param'));
    }

    public function edit(Param $param)
    {
        $param = ParamResource::make($param)->resolve();
        $filterTypes = ParamFilterTypeEnum::Collection();
        return inertia('Admin/Param/Edit', compact('param', 'filterTypes'));
    }

    public function update(UpdateRequest $request, Param $param)
    {
        $data  = $request->validated();
        $param = $this->paramService->update($param, $data);
        return ParamResource::make($param)->resolve();
    }

    public function destroy(Param $param)
    {
        $param->delete();
        return response()->json(['message' => 'success'], Response::HTTP_OK);
    }
}
