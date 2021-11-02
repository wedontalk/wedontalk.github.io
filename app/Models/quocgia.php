<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quocgia extends Model
{
    use HasFactory;
    protected $table = 'nation';
    
    protected $fillable = ['id','name', 'anHien'];

    //protected $filltable = ['name', 'status', 'prioty'];

    public function products()
    {
       return $this->hasMany(phim::class,'category_id','id');
    }
    //localscope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
