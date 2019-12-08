<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  protected $table = 'providers';
  protected $fillable = ['name','email', 'phone'];
  protected $primaryKey = 'id';
  public $timestamps =false;

  public function working_areas(){
    return $this->hasMany('App\Workingarea','provider_id','id');
  }

  public function block_days(){
    return $this->hasMany('App\Blockdays','provider_id','id');
  }

  public function services(){
    return $this->belongsToMany('App\Service','avail_services','provider_id','service_id');
  }

  public function areas(){
    return $this->belongsToMany('App\Managed_Area','working_areas','provider_id','area_id');
  }

  public function bookings(){
      return $this->hasMany('App\Booking','provider_id','id');
  }
}
