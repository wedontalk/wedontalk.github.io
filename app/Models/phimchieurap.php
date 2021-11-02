<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phimchieurap extends Model
{
    use HasFactory;
    protected $table = 'theater-movie';
    protected $fillable = ['id','name','year','slug_theater','anHien'];
    public function products()
    {
       return $this->hasMany(phim::class,'theater_id','id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
