<?php

namespace Modules\Vehicles\Services;

interface IVehicleService
{
    public function index(array $payload): array;

    public function store(array $payload): array;

    public function show(int $id): array;

    public function update(array $payload, int $id): array;

    public function destroy(int $id): array;
}
