<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingBasic extends Model
{
  protected $table = 'setting_basics';
  protected $fillable = ['name','displayName','logoImage','faviconImage','loadingColor','loadingStatus','meta_title','meta_keywords','meta_description','header_code','footer_code','style_code','link'];
  protected $primaryKey = 'id';
  public $timestamps =false;
 
 }
