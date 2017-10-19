<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = ["type", "local_name", "cep", "lat", "lng", "address", "created_at", "updated_at"];
  protected $guarded = ["id"];
}
