<?php

namespace Modules\RealEstate\Services\RealEstateRent;

use Exception;
use Illuminate\Support\Facades\Log;
use Modules\RealEstate\Models\RealEstate;

class RealEstateRentService implements IRealEstateRentService
{
    public function index(array $payload): array
    {
        try {
            $perPage = $payload['per_page'] ?? 15;

            $rents = RealEstate::where('offer_type', 'rent')
                ->paginate($perPage);

            return [true, $rents, 200, 'Real estate rentals retrieved successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateRentService@index', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to retrieve real estate rentals.'];
        }
    }

    public function store(array $payload): array
    {
        try {
            $data = $payload;
            $data['offer_type'] = 'rent';

            $rent = RealEstate::create($data);

            return [true, $rent, 201, 'Real estate rental created successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateRentService@store', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to create real estate rental.'];
        }
    }

    public function show(int $id): array
    {
        try {
            $rent = RealEstate::where('offer_type', 'rent')
                ->findOrFail($id);

            return [true, $rent, 200, 'Real estate rental retrieved successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateRentService@show', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 404, 'Real estate rental not found.'];
        }
    }

    public function update(array $payload, int $id): array
    {
        try {
            $realEstate = RealEstate::where('offer_type', 'rent')
                ->findOrFail($id);

            $realEstate->update($payload);

            return [true, $realEstate, 200, 'Real estate rental updated successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateRentService@update', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to update real estate rental.'];
        }
    }

    public function destroy(int $id): array
    {
        try {
            $realEstate = RealEstate::where('offer_type', 'rent')
                ->findOrFail($id);

            $realEstate->delete();

            return [true, [], 200, 'Real estate rental deleted successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateRentService@destroy', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 404, 'Real estate rental not found.'];
        }
    }
}
