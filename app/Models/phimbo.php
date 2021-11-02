<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phimbo extends Model
{
    use HasFactory;
    protected $table = 'series-movie';
    protected $fillable = ['id','name','year','slug_series','anHien'];
    public function products()
    {
       return $this->hasMany(phim::class,'series_id','id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
