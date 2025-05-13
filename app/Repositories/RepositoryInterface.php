<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function all(): mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id): int;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed;

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id): mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): int;
}
