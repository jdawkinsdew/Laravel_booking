<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddonService extends Model
{
  protected $table = 'service_add';
  protected $fillable = ['addService','cost',];
  protected $primaryKey = 'id';
  public $timestamps =false;
}
