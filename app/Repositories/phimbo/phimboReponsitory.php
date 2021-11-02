<?php
namespace App\Repositories\phimbo;

use App\Repositories\EloquentRepository;
class phimboReponsitory extends EloquentRepository implements phimboInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {   
        return \App\Models\phimbo::class;
    }
    // public function getAll()
    // {
    //     return $this->_model::all();
    // }
    public function orderBy(){
        return phimbo::orderBy('id', 'DESC')->search()->paginate(10);
    }


}