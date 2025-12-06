<?php

namespace Modules\RealEstate\Services;

use Modules\RealEstate\Http\Requests\RealEstateRequest;

interface RealEstateServiceInterface
{
    /**
     * الحصول على جميع العقارات مع إمكانية التصفية
     */
    public function getAllRealEstates(array $filters = []);

    /**
     * الحصول على عقارات المستخدم المحدد
     */
    public function getMyRealEstates($userId, array $filters = []);

    /**
     * إنشاء عقار جديد
     */
    public function createRealEstate(RealEstateRequest $request, $userId): array;

    /**
     * تحديث عقار موجود
     */
    public function updateRealEstate(RealEstateRequest $request, $realEstateId, $userId): array;

    /**
     * حذف عقار
     */
    public function deleteRealEstate($realEstateId, $userId): array;

    /**
     * الحصول على عقار محدد بواسطة ID
     */
    public function getRealEstateById($id): array;
}
