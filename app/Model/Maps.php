<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Maps extends Model {

  protected $fillable = ["type", "lat", "lng", "created_at", "updated_at"];
  protected $guarded = ["id"];

}
