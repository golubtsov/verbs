<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractBaseService implements BaseServiceInterface
{
    protected Model $model;

    public function store(array $data): Model
    {
        return $this->model->newQuery()->create($data);
    }

    public function destroy(int $id): ?bool
    {
        $model = $this->model::query()->findOrFail($id);
        return $model->delete();
    }
}
