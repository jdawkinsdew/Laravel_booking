<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    public function provider()
    {
        return $this->hasOne('App\Provider','id','provider_id');
    }
    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    }
}
