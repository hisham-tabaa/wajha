<?php

namespace Modules\RealEstate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\RealEstate\Models\RealEstate;
use Modules\RealEstate\Services\RealEstateServiceInterface;
use Modules\RealEstate\Http\Requests\RealEstateRequest;
use Illuminate\Support\Facades\Auth;

class RealEstateController extends Controller
{
    private RealEstateServiceInterface $realEstateService;

    public function __construct(RealEstateServiceInterface $realEstateService)
    {
        $this->realEstateService = $realEstateService;
    }

    /**
     * عرض جميع العقارات (للمستخدمين والبائعين والمشرفين)
     */
    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['offer_type', 'city', 'type', 'min_price', 'max_price']);

        $realEstates = $this->realEstateService->getAllRealEstates($filters);

        return $this->successResponse($realEstates, 200, 'تم جلب العقارات بنجاح');
    }

    /**
     * عرض عقارات البائع الخاصة به فقط
     */
    public function myRealEstates(Request $request): JsonResponse
    {
        $this->authorize('viewAnyMy', RealEstate::class);

        $filters = $request->only(['offer_type', 'city', 'type']);
        $userId = Auth::id();

        $realEstates = $this->realEstateService->getMyRealEstates($userId, $filters);

        return $this->successResponse($realEstates, 200, 'تم جلب عقاراتك بنجاح');
    }

    /**
     * عرض عقار محدد
     */
    public function show($id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->realEstateService->getRealEstateById($id);

        if (!$status) {
            return $this->errorResponse($data, $code, $message);
        }

        $this->authorize('view', $data);

        return $this->successResponse($data, $code, $message);
    }

    /**
     * إنشاء عقار جديد
     */
    public function store(RealEstateRequest $request): JsonResponse
    {
        $this->authorize('create', RealEstate::class);

        $userId = Auth::id();

        [$status, $data, $code, $message] = $this->realEstateService->createRealEstate($request, $userId);

        return $status ?
            $this->successResponse($data, $code, $message) :
            $this->errorResponse($data, $code, $message);
    }

    /**
     * تحديث عقار
     */
    public function update(RealEstateRequest $request, $id): JsonResponse
    {
        // أولاً: جلب العقار
        [$status, $realEstate, $code, $message] = $this->realEstateService->getRealEstateById($id);

        if (!$status) {
            return $this->errorResponse($realEstate, $code, $message);
        }

        // ثانياً: التحقق من الصلاحية
        $this->authorize('update', $realEstate);

        // ثالثاً: التحديث
        $userId = Auth::id();
        [$status, $data, $code, $message] = $this->realEstateService->updateRealEstate($request, $id, $userId);

        return $status ?
            $this->successResponse($data, $code, $message) :
            $this->errorResponse($data, $code, $message);
    }

    /**
     * حذف عقار
     */
    public function destroy($id): JsonResponse
    {
        // أولاً: جلب العقار
        [$status, $realEstate, $code, $message] = $this->realEstateService->getRealEstateById($id);

        if (!$status) {
            return $this->errorResponse($realEstate, $code, $message);
        }

        // ثانياً: التحقق من الصلاحية
        $this->authorize('delete', $realEstate);

        // ثالثاً: الحذف
        $userId = Auth::id();
        [$status, $data, $code, $message] = $this->realEstateService->deleteRealEstate($id, $userId);

        return $status ?
            $this->successResponse($data, $code, $message) :
            $this->errorResponse($data, $code, $message);
    }
}
