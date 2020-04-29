<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rice extends Model
{
    protected $fillable = ['dealer_id','amount','rice_giving_time'];
}
