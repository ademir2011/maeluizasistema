<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
  protected $fillable = ["local_name_phone", "phone", "created_at", "updated_at"];
  protected $guarded = ["id"];
}
