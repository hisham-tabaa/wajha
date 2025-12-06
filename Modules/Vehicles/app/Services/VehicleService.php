<?php

namespace Modules\Vehicles\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Modules\Vehicles\Models\Vehicle;

class VehicleService implements IVehicleService
{
    public function index(array $payload): array
    {
        try {
            $perPage = $payload['per_page'] ?? 15;

            $vehicles = Vehicle::paginate($perPage);

            return [true, $vehicles, 200, 'Vehicles retrieved successfully'];
        } catch (Exception $exception) {
            Log::error('VehicleService@index', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to retrieve vehicles.'];
        }
    }

    public function store(array $payload): array
    {
        try {
            $vehicle = Vehicle::create($payload);

            return [true, $vehicle, 201, 'Vehicle created successfully'];
        } catch (Exception $exception) {
            Log::error('VehicleService@store', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to create vehicle.'];
        }
    }

    public function show(int $id): array
    {
        try {
            $vehicle = Vehicle::findOrFail($id);

            return [true, $vehicle, 200, 'Vehicle retrieved successfully'];
        } catch (Exception $exception) {
            Log::error('VehicleService@show', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 404, 'Vehicle not found.'];
        }
    }

    public function update(array $payload, int $id): array
    {
        try {
            $vehicle = Vehicle::findOrFail($id);

            $vehicle->update($payload);

            return [true, $vehicle, 200, 'Vehicle updated successfully'];
        } catch (Exception $exception) {
            Log::error('VehicleService@update', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to update vehicle.'];
        }
    }

    public function destroy(int $id): array
    {
        try {
            $vehicle = Vehicle::findOrFail($id);

            $vehicle->delete();

            return [true, [], 200, 'Vehicle deleted successfully'];
        } catch (Exception $exception) {
            Log::error('VehicleService@destroy', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 404, 'Vehicle not found.'];
        }
    }
}
