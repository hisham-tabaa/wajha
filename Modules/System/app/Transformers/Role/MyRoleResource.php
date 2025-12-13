<?php

namespace Modules\System\Transformers\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\System\Responce\Permission\PermissionNameResponce;

class MyRoleResource extends JsonResource
{
    private $policies;
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array 
    {
        $this->policies = config('role_policy.policy');
        return [
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'policy' => array_search($this->policy, $this->policies, true),
            'permissions' => $this->whenLoaded('permissions', function () {
                return (new PermissionNameResponce($this->permissions->all()))->data;
            }),
        ];
    }
}
