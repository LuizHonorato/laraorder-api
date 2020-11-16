<?php


namespace App\Repositories\Core;


use App\Exceptions\NotEntityDefined;

class BaseEloquentRepository
{
    protected $entity;
    protected $today;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
        $this->today = date("Y-m-d");
    }

    public function all()
    {
        return $this->entity->get();
    }

    public function findById($id)
    {
        return $this->entity->find($id);
    }

    public function findWhere($column, $value)
    {
        return $this->entity->where($column, $value)->get();
    }

    public function findWhereFirst($column, $value)
    {
        return $this->entity->where($column, $value)->first();
    }

    public function findWhereBetween($column, $to, $from)
    {
        return $this->entity->whereBetween($column, [$to, $from])->get();
    }

    public function paginate($totalPage = 10)
    {
        return $this->entity->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    public function update($id, array $data)
    {
        return $this->findById($id)->update($data);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function relationships(...$relationships)
    {
        $this->entity = $this->entity->with($relationships);

        return $this;
    }

    public function resolveEntity()
    {
        if(!method_exists($this, 'entity')) {
            throw new NotEntityDefined();
        }

        return app($this->entity());
    }
}
