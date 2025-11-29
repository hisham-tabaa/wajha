<?php

namespace Modules\RealEstate\Services\RealEstateSale;

use Exception;
use Illuminate\Support\Facades\Log;
use Modules\RealEstate\Models\RealEstate;

class RealEstateSaleService implements IRealEstateSaleService
{
    public function index(array $payload): array
    {
        try {
            $perPage = $payload['per_page'] ?? 15;

            $sales = RealEstate::where('offer_type', 'sale')
                ->paginate($perPage);

            return [true, $sales, 200, 'Real estate sales retrieved successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateSaleService@index', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to retrieve real estate sales.'];
        }
    }

    public function store(array $payload): array
    {
        try {
            $data = $payload;
            $data['offer_type'] = 'sale';

            $sale = RealEstate::create($data);

            return [true, $sale, 201, 'Real estate sale created successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateSaleService@store', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to create real estate sale.'];
        }
    }

    public function show(int $id): array
    {
        try {
            $sale = RealEstate::where('offer_type', 'sale')
                ->findOrFail($id);

            return [true, $sale, 200, 'Real estate sale retrieved successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateSaleService@show', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 404, 'Real estate sale not found.'];
        }
    }

    public function update(array $payload, int $id): array
    {
        try {
            $realEstate = RealEstate::where('offer_type', 'sale')
                ->findOrFail($id);

            $realEstate->update($payload);

            return [true, $realEstate, 200, 'Real estate sale updated successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateSaleService@update', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to update real estate sale.'];
        }
    }

    public function destroy(int $id): array
    {
        try {
            $realEstate = RealEstate::where('offer_type', 'sale')
                ->findOrFail($id);

            $realEstate->delete();

            return [true, [], 200, 'Real estate sale deleted successfully'];
        } catch (Exception $exception) {
            Log::error('RealEstateSaleService@destroy', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 404, 'Real estate sale not found.'];
        }
    }
}
