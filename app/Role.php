<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    //relation with users
    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
