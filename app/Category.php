<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{




   /**
* The attributes that aren't mass assignable.
*
* @var array
*/
protected $guarded = [];


protected $fillable = ['name','description' 
  ];

    //relation with post
    public function posts()
{
    return $this->belongsToMany('App\Post');
}


}
