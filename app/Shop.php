<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    // -------- [ Mass Assignment ] ---------
    protected $fillable = ["shop_name", "description", "address", "latitude", "longitude", "image"];
}
