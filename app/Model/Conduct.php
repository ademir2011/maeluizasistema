<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Conduct extends Model
{
    protected $fillable = ["path_image", "text", "date", "phone"];
    protected $guarded = ["id"];

}
