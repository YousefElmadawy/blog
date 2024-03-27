<?php 

namespace App\Abstracts;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements UserRepositoryInterface 
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        // dd($model);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $attributes){

        return $this->model->create($attributes);

    }

    public function updateData(Model $model ,array $attributes){
        // dd($model); 

        return $model->update($attributes);

    }
    public function deleteData(Model $model){
        // dd($id);
        return $model->delete($model);
    }
 





}