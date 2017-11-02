<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

  protected $fillable = ['text','photo','data'];
  protected $guarded = ["id"];
  
}
