<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function status()
    {
    	return $this->belongsTo('App\Status');
    }

    public function assets()
    {
    	return $this->belongsToMany('App\Asset');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
