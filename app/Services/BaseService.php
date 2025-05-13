<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;

class BaseService implements ServiceInterface
{
    protected $repository;

    public function __construct(    RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function all(): mixed
    {
        return $this->repository->all();
    }

    /**
     * @param int $id
     * @return mixed
     */

    public function find(int $id): mixed
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */

    public function create(array $data): mixed
    {
        return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */

    public function update(array $data, int $id): mixed
    {
        ;
        return $this->repository->update($data,$id);
    }

    /**
     * @param int $id
     * @return mixed
     */

    public function delete(int $id): mixed
    {

        return $this->repository->delete($id);
    }
}
