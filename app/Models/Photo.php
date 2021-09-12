<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
        
        protected $table = "photos";

        protected $fillable = ['name','image','slug','albums_id'];

        public function albums()
        {
            return $this->belongsTo('App\Models\album' , 'albums_id' , 'id');
        }
        
        protected $dates = ['deleted_at'];
        
        use SoftDeletes;

}
