<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availableservice extends Model
{
  protected $table = 'avail_services';
  protected $fillable = ['provider_id','service_id'];
  protected $primaryKey = 'id';
  public $timestamps =false;

    public function service(){
    return $this->belongsTo('App\Provider','id','provider_id');
    }
    public function mService(){
    return $this->belongsTo('App\Service','id','service_id');
    }
}
