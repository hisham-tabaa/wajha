<?php

namespace Modules\System\Services\Role;

use Spatie\Permission\Models\Role;
use Modules\System\Http\Requests\Role\AddRoleRequest;
use Modules\System\Http\Requests\Role\UpdateRoleRequest;

interface IRoleService
{
    public function list(): array;
    public function create(AddRoleRequest $request): array;

    public function update(int $id, UpdateRoleRequest $request): array;

    public function delete(int $id): array;

    public function get(int $id): array;
}
