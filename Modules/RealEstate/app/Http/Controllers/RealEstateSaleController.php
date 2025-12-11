<?php

namespace Modules\RealEstate\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RealEstate\Http\Requests\IndexRealEstateRequest;
use Modules\RealEstate\Http\Requests\StoreRealEstateRequest;
use Modules\RealEstate\Http\Requests\UpdateRealEstateRequest;
use Modules\RealEstate\Services\RealEstateSale\IRealEstateSaleService;
use Modules\RealEstate\Transformers\RealEstateSale\RealEstateSaleResource;

class RealEstateSaleController extends Controller
{
    public function __construct(private readonly IRealEstateSaleService $realEstateSaleService) {}

    public function index(IndexRealEstateRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateSaleService->index($request->validated());

        return $status
            ? $this->successResponse(RealEstateSaleResource::collection($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function store(StoreRealEstateRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateSaleService->store($request->validated());

        return $status
            ? $this->successResponse(new RealEstateSaleResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function show(int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateSaleService->show($id);

        return $status
            ? $this->successResponse(new RealEstateSaleResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function update(UpdateRealEstateRequest $request, int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateSaleService->update($request->validated(), $id);

        return $status
            ? $this->successResponse(new RealEstateSaleResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function destroy(int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateSaleService->destroy($id);

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
