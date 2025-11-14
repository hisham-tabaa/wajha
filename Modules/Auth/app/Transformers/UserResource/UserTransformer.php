<?php

namespace Modules\Auth\App\Transformers\UserResource;
// namespace Modules\Auth\Transformers\UserResource; //edit


use Modules\Auth\Models\User;
// use Illuminate\Http\Resources\Json\JsonResource; //add

class UserTransformer
// class UserResource extends JsonResource //edit
{
    public static function transform(User $user): array
    // public function toArray(Request $request): array //edit
    {
        return [
            'id'            => $user->id,
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'email'         => $user->email,
            'avatar'        => $user->avatar,
            'gender'        => $user->gender,
            'birthday'      => $user->birthday,
            'phone'         => $user->phone,
            'nationalty_id' => $user->nationalty_id,
        ];
    }
}
