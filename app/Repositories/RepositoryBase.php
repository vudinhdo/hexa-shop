<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class RepositoryBase implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel(): void
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function all(): mixed
    {
        return $this->model->all();
    }

    public function find(int $id): int
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    public function update( array $data,int $id): mixed
    {
        $item = $this->findById($id);
        $item->update($data);
        return $item;
    }

    public function delete($id): int
    {
        $item = $this->findById($id);
        return $item->delete();
    }
}
