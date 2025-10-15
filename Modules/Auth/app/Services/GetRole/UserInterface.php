<?php

namespace Modules\Auth\Services\GetRole;

use Modules\Auth\Http\Requests\ChangeUserRoleRequest;

interface UserInterface
{
    public function getRoles();
    public function changeUserRole(ChangeUserRoleRequest $request): array;


}
