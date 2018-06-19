<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable = [
        'user_id', 'messageid', 'message', 'status', 'statustext', 'sender', 'receptor', 'date', 'cost', 'type', 'ip'
    ];

}
