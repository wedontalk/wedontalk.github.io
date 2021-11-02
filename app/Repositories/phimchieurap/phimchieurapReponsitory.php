<?php
namespace App\Repositories\phimchieurap;

use App\Repositories\EloquentRepository;
class phimchieurapReponsitory extends EloquentRepository implements phimchieurapInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {   
        return \App\Models\phimchieurap::class;
    }
    // public function getAll()
    // {
    //     return $this->_model::all();
    // }
    public function orderBy(){
        return phimchieurap::orderBy('id', 'DESC')->search()->paginate(10);
    }


}