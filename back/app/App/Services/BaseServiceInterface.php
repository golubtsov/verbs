<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseServiceInterface
{
    public function list(): array|Collection;

    public function store(array $data): Model;

    public function update(): Model;

    public function destroy(int $id): ?bool;
}
