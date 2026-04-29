<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        protected Model $model
    )//recebe model e guarda this->model
    {}

    public function all(): Collection
    {
        return $this->model
        ->newQuery()
        ->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator{

        return $this->model
        ->newQuery()
        ->latest()
        ->paginate($perPage);
    }

    public function findOrFail(int $id): Model{

        return $this->model
        ->newQuery()
        ->findOrFail($id);
    }

    public function create(array $data): Model{

        return $this->model
        ->newQuery()
        ->create($data);
    }

    public function update(int $id, array $data): Model{
        $model = $this->findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id): bool{
        $model = $this->findOrFail($id);
        return (bool) $model->delete();
    }

}