<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
  protected $table = 'working_hours';
  protected $fillable = ['date', 'start_time', 'finish_time','status'];
  protected $primaryKey = 'id';
  public $timestamps =false;
}
