<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;


       /**
* The attributes that aren't mass assignable.
*
* @var array
*/
protected $guarded = [];


protected $fillable = ['title','description' 
  ];


    //relation with category
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
