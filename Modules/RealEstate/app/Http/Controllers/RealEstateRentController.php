<?php

namespace Modules\RealEstate\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RealEstate\Http\Requests\IndexRealEstateRequest;
use Modules\RealEstate\Http\Requests\StoreRealEstateRequest;
use Modules\RealEstate\Http\Requests\UpdateRealEstateRequest;
use Modules\RealEstate\Services\RealEstateRent\IRealEstateRentService;
use Modules\RealEstate\Transformers\RealEstateRent\RealEstateRentResource;

class RealEstateRentController extends Controller
{
    public function __construct(private readonly IRealEstateRentService $realEstateRentService)
    {
    }

    public function index(IndexRealEstateRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateRentService->index($request->validated());

        return $status
            ? $this->successResponse(RealEstateRentResource::collection($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function store(StoreRealEstateRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateRentService->store($request->validated());

        return $status
            ? $this->successResponse(new RealEstateRentResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function show(int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateRentService->show($id);

        return $status
            ? $this->successResponse(new RealEstateRentResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function update(UpdateRealEstateRequest $request, int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateRentService->update($request->validated(), $id);

        return $status
            ? $this->successResponse(new RealEstateRentResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function destroy(int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateRentService->destroy($id);

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
