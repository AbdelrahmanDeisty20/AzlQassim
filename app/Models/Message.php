<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'phone', 'city', 'subject', 'msg', 'date', 'replied'];
    protected $casts = [
        'replied' => 'boolean',
    ];
}
