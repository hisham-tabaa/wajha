<?php

namespace Modules\System\Transformers\Permission;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{

    public function toArray(Request $request): array
    {
       
        return [
            'group' => $this['group'],
            'group_en' => $this['group_en'],
            'group_ar' => $this['group_ar'],
            'permissions' => PermissionRes::collection($this['permissions']),
        ];
    }
}
