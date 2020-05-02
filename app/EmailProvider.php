<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailProvider extends Model
{

    protected $fillable = [

        'to','subject','email','schedule'

    ];
}
