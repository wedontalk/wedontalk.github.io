<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaiphim extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = ['id','name', 'anHien'];

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
