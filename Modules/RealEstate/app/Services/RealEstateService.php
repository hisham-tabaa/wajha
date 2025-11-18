<?php

namespace Modules\RealEstate\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\RealEstate\Models\RealEstate;
use Modules\RealEstate\Http\Requests\RealEstateRequest;
use Illuminate\Support\Facades\Log;

class RealEstateService implements RealEstateServiceInterface
{
    public function getAllRealEstates(array $filters = [])
    {
        try {
            $query = RealEstate::with(['user', 'features']);

            // تطبيق الفلاتر
            if (isset($filters['offer_type'])) {
                $query->where('offer_type', $filters['offer_type']);
            }

            if (isset($filters['city'])) {
                $query->where('city', 'like', '%' . $filters['city'] . '%');
            }

            if (isset($filters['type'])) {
                $query->where('type', $filters['type']);
            }

            if (isset($filters['min_price'])) {
                $query->where('price', '>=', $filters['min_price']);
            }

            if (isset($filters['max_price'])) {
                $query->where('price', '<=', $filters['max_price']);
            }

            return $query->paginate(10);

        } catch (Exception $e) {
            Log::error("RealEstateService@getAllRealEstates", [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            throw $e;
        }
    }

    public function getMyRealEstates($userId, array $filters = [])
    {
        try {
            $query = RealEstate::with(['user', 'features'])
                ->where('user_id', $userId);

            // تطبيق الفلاتر
            foreach ($filters as $key => $value) {
                if (!empty($value)) {
                    $query->where($key, $value);
                }
            }

            return $query->paginate(10);

        } catch (Exception $e) {
            Log::error("RealEstateService@getMyRealEstates", [
                'message' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    public function createRealEstate(RealEstateRequest $request, $userId): array
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['user_id'] = $userId;

            $realEstate = RealEstate::create($data);

            // إضافة الميزات إذا وجدت
            if ($request->has('features')) {
                $realEstate->features()->sync($request->features);
            }

            DB::commit();

            return [true, $realEstate->load('features'), 201, 'تم إنشاء العقار بنجاح'];

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("RealEstateService@createRealEstate", [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return [false, [], 500, 'فشل في إنشاء العقار'];
        }
    }

    public function updateRealEstate(RealEstateRequest $request, $realEstateId, $userId): array
    {
        DB::beginTransaction();
        try {
            $realEstate = RealEstate::where('id', $realEstateId)
                ->where('user_id', $userId)
                ->first();

            if (!$realEstate) {
                return [false, [], 404, 'العقار غير موجود أو ليس لديك صلاحية التعديل'];
            }

            $data = $request->validated();
            $realEstate->update($data);

            // تحديث الميزات إذا وجدت
            if ($request->has('features')) {
                $realEstate->features()->sync($request->features);
            }

            DB::commit();

            return [true, $realEstate->load('features'), 200, 'تم تحديث العقار بنجاح'];

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("RealEstateService@updateRealEstate", [
                'message' => $e->getMessage()
            ]);
            return [false, [], 500, 'فشل في تحديث العقار'];
        }
    }

    public function deleteRealEstate($realEstateId, $userId): array
    {
        DB::beginTransaction();
        try {
            $realEstate = RealEstate::where('id', $realEstateId)
                ->where('user_id', $userId)
                ->first();

            if (!$realEstate) {
                return [false, [], 404, 'العقار غير موجود أو ليس لديك صلاحية الحذف'];
            }

            $realEstate->features()->detach();
            $realEstate->delete();

            DB::commit();

            return [true, [], 200, 'تم حذف العقار بنجاح'];

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("RealEstateService@deleteRealEstate", [
                'message' => $e->getMessage()
            ]);
            return [false, [], 500, 'فشل في حذف العقار'];
        }
    }

    public function getRealEstateById($id): array
    {
        try {
            $realEstate = RealEstate::with(['user', 'features'])->find($id);

            if (!$realEstate) {
                return [false, [], 404, 'العقار غير موجود'];
            }

            return [true, $realEstate, 200, 'تم جلب بيانات العقار بنجاح'];

        } catch (Exception $e) {
            Log::error("RealEstateService@getRealEstateById", [
                'message' => $e->getMessage()
            ]);
            return [false, [], 500, 'فشل في جلب بيانات العقار'];
        }
    }
}
