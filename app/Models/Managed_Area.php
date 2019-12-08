<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Managed_Area extends Model
{
  protected $table = 'managed_areas';
  protected $fillable = ['name','zip_code','color'];
  protected $primaryKey = 'id';
  public $timestamps =false;

  public function providers(){
    return $this->belongsToMany('App\Provider','working_areas','area_id','provider_id');
  }

  public function clients(){
    return $this->hasMany('App\Client','area_id','id');
  }
}
