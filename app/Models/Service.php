<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'services';
  protected $fillable = ['name', 'one_time', 'recurring'];
  protected $primaryKey = 'id';
  public $timestamps =false;

  public function providers(){
    return $this->belongsToMany('App\Provider','avail_services','service_id','provider_id');
  }
}
