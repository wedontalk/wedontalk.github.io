<?php
namespace App\Repositories\phimbo;

interface phimboInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    
    // public function get($id);

    // public function store(array $data);

    // public function update($id, array $data);

    // public function delete($id);
}