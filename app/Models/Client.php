<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table = 'clients';
  protected $fillable = ['name','email','phone','area_id','verified','photo'];
  protected $primaryKey = 'id';
  public $timestamps =false;

  public function bookings(){
      return $this->hasMany('App\Booking','client_id','id');
  }
  public function area(){
      return $this->belongsTo('App\Managed_Area','area_id');
  }
}
