<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'dados';

    protected $fillable = ['temperatura', 'corrente', 'tensao', 'potencia'];
}
