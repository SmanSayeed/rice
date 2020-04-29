<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Given extends Model
{
    protected $fillable = ['dealer_id','taker_id','amount'];
}
