<?php

namespace Modules\System\Transformers\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\System\Responce\Permission\PermissionResponce;

class RoleResource extends JsonResource
{
    private $policies;

    /**
     *
     * @param Request $request
     * @return array
     */



   public function toArray(Request $request): array
    {
        $this->policies = config('role_policy.policy');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'policy' => array_search($this->policy, $this->policies, true),
            'can_delete' => (bool) $this->can_delete,
            'guard_name' => $this->guard_name,
            'permissions' => $this->whenLoaded('permissions', function () {
                return (new PermissionResponce($this->permissions->all()))->data;
            }),
        ];
    }
}

