<?php

namespace Modules\Vehicles\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Vehicles\Http\Requests\IndexVehicleRequest;
use Modules\Vehicles\Http\Requests\StoreVehicleRequest;
use Modules\Vehicles\Http\Requests\UpdateVehicleRequest;
use Modules\Vehicles\Services\IVehicleService;
use Modules\Vehicles\Transformers\VehicleResource;

class VehicleController extends Controller
{
    public function __construct(private readonly IVehicleService $vehicleService) {}

    public function index(IndexVehicleRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->vehicleService->index($request->validated());

        return $status
            ? $this->successResponse(VehicleResource::collection($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function store(StoreVehicleRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->vehicleService->store($request->validated());

        return $status
            ? $this->successResponse(new VehicleResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function show(int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->vehicleService->show($id);

        return $status
            ? $this->successResponse(new VehicleResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function update(UpdateVehicleRequest $request, int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->vehicleService->update($request->validated(), $id);

        return $status
            ? $this->successResponse(new VehicleResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function destroy(int $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->vehicleService->destroy($id);

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
