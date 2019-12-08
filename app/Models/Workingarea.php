<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workingarea extends Model
{
  protected $table = 'working_areas';
  protected $fillable = ['provider_id','name','zip_code'];
  protected $primaryKey = 'id';
  public $timestamps =false;
  
    public function service(){
    return $this->belongsTo('App\Provider','id','provider_id');
    }

}


