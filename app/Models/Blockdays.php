<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockdays extends Model
{
  protected $table = 'blocks';
  protected $fillable = ['date','provider_id','reason'];
  protected $primaryKey = 'id';
  public $timestamps =false;

    public function provider(){
    return $this->belongsTo('App\Provider','id','provider_id');
    }
}
