<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phimle extends Model
{
    use HasFactory;
    protected $table = 'single-movie';
    protected $fillable = ['id','name','year','slug_single','anHien'];
    public function phimle(){
        return $this->belongsTo('App\Models\phim');
    }
    public function products()
    {
       return $this->hasMany(phim::class,'single_id','id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
