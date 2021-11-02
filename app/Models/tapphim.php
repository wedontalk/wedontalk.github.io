<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tapphim extends Model
{
    use HasFactory;
    protected $table="episode";
    protected $fillable = ['film_id', 'episode','episode_name','content','slug_phim'];


    public function products()
    {
       return $this->hasOne(phim::class,'id','film_id');
    }
    public function phim(){
      return $this->belongsTo('App\Models\phim');
    }
    // public function idphim()
    // {
    //   return $this->hasOne(phim::class, 'film_id', 'id');
    // }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('slug_phim','like','%'.$key.'%');
        }
        return $query;
    }
}
