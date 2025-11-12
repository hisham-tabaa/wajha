<?php

namespace Modules\RealEstate\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Auth\Models\User;
use Modules\RealEstate\Models\RealEstate;

class SellerPolicy
{
    use HandlesAuthorization;

    /**
     * السماح للمشرف فقط بالوصول الكامل.
     */
    public function before(User $user)
    {
        if ($user->role->name === 'admin') {
            return true;
        }
    }

    /**
     * تحديد من يمكنه عرض قائمة العقارات.
     */
    public function viewAny(User $user)
    {
        return in_array($user->role->name, ['admin', 'seller', 'user']);
    }

    public function viewAnyMy(User $user)
    {
        return in_array($user->role->name, ['seller']);
    }

    /**
     * تحديد من يمكنه عرض عقار واحد.
     */
    public function view(User $user, RealEstate $realEstate)
    {
        return in_array($user->role->name, ['admin', 'seller', 'user']);
    }

    public function viewMy(User $user, RealEstate $realEstate)
    {
        return $realEstate->user_id === $user->id;
    }

    /**
     * تحديد من يمكنه إنشاء عقار جديد.
     */
    public function create(User $user)
    {
        return $user->role->name === 'seller';
    }

    /**
     * تحديد من يمكنه تحديث عقار.
     */
    public function update(User $user, RealEstate $realEstate)
    {
        return $user->role->name === 'seller' && $realEstate->user_id == $user->id;
    }

    /**
     * تحديد من يمكنه حذف عقار.
     */
    public function delete(User $user, RealEstate $realEstate)
    {
        return $user->role->name === 'seller' && $realEstate->user_id === $user->id;
    }
}
