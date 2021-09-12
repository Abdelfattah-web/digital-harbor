<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
       
        protected $table = "albums";

        protected $fillable = ['name','image','slug','created_by_id'];

        protected $dates = ['deleted_at'];

        use SoftDeletes;

        public function getRouteKeyName()
        {
          return 'slug';
        }

        public function photos()
    {
        return $this->hasMany('App\Models\Photo', 'albums_id' , 'id');
    }

    public function users()
    {
      return $this->belongsTo('App\User','created_by_id', 'id');
    }

}
