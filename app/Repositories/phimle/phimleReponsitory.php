<?php
namespace App\Repositories\phimle;

use App\Repositories\EloquentRepository;
class phimleReponsitory extends EloquentRepository implements phimleInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {   
        return \App\Models\phimle::class;
    }
    // public function getAll()
    // {
    //     return $this->_model::all();
    // }
    public function orderBy(){
        return phimle::orderBy('id', 'DESC')->search()->paginate(10);
    }


}