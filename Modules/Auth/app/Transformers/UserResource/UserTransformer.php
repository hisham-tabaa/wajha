<?php

namespace Modules\Auth\Transformers\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'phone' => $this->phone,
            'nationalty_id' => $this->nationalty_id,
        ];
    }
}
