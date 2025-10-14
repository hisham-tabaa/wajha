<?php

namespace Modules\System\Transformers\Permission;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionRes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'name_en' => $this['name_en'],
            'name_ar' => $this['name_ar'],
        ];
    }
}
