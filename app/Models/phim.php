<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phim extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $fillable = ['name','category_id','image','name2','year','type_movie','description','nation_id','duration','author','status','director','actor','anHien'];

    public function cat()
    {
      return $this->hasOne(loaiphim::class, 'id', 'category_id');
    }
    public function quocgia()
    {
      return $this->hasOne(quocgia::class, 'id', 'nation_id');
    }
    public function kieuphim()
    {
      return $this->hasOne(kieuphim::class, 'id', 'type_movie');
    }
    public function tapphim()
    {
      return $this->hasMany(tapphim::class, 'film_id', 'id');
    }
    public function phimle(){
      return $this->belongsTo('App\Models\phimle');
    }
    // public function categorys()
    // {
    //    return $this->hasMany(category::class,'id','category_id');
    // }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
