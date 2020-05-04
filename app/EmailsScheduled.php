<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailsScheduled extends Model
{
    protected $table='emails_scheduled';


    protected $fillable = [
        'user_id', 'to', 'subject', 'message', 'scheduled_at'
    ];

    protected $dates = [
        'scheduled_at'
    ];
}
