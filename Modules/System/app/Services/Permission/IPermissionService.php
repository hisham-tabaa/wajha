<?php

namespace Modules\System\Services\Permission;
use Spatie\Permission\Models\Permission;

interface IPermissionService
{
    public function list(): array;

    public function update(int $id, array $data): array;

    public function get(int $id): array;
}
