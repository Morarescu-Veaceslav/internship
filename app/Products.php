<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Auth;
class Products extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function favorite(){
        return $this->belongsToMany('App\User');
    }
}
