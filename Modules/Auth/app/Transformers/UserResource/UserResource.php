<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Responce\Permission\PermissionNameResponce;

class UserResource extends JsonResource
{
    private $policies;
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        $this->policies = config('role_policy.policy');

        if (is_array($this->resource) && isset($this->resource['user'])) {
            $user = $this->resource['user'];

            $data = [
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'full_name' => trim("{$user['first_name']} {$user['last_name']}"),
                'email' => $user['email'],
                'phone' => $user['phone'],
                'role' => [
                    'id' => $user['role']['id'] ?? null,
                    'name' => $user['role']['name'] ?? null,
                    'name_ar' => $user['role']['name_ar'] ?? null,
                    'name_en' => $user['role']['name_en'] ?? null,
                    'policy' => array_search($user['role']['policy'] ?? null, $this->policies, true),
                    'permissions' => isset($user['role']['permissions'])
                        ? (new PermissionNameResponce($user['role']['permissions']->all()))->data
                        : [],
                ],
                'avatar' => $user['avatar'] ? url(Storage::url($user['avatar'])) : null,
            ];

            if (isset($this->resource['token'])) {
                $data['token'] = $this->resource['token'];
            }

            return $data;
        }
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->fullName ?? trim("{$this->first_name} {$this->last_name}"),
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => $this->avatar ? url(Storage::url($this->avatar)) : null,
            'role' => $this->when($this->relationLoaded('role'), function () {
                return [
                    'id' => $this->role->id,
                    'name' => $this->role->name,
                    'name_ar' => $this->role->name_ar,
                    'name_en' => $this->role->name_en,
                    'policy' => array_search($this->role->policy, $this->policies, true),
                    'permissions' => $this->relationLoaded('permissions')
                        ? (new PermissionNameResponce($this->role->permissions->all()))->data
                        : [],
                ];
            }),
            'token' => $this->when(isset($this->token), $this->token),
        ];
    }
}
