<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'name', 'phone', 'city', 'district', 'service', 'btype',
        'area', 'notes', 'reqDate', 'reqTime', 'status', 'date'
    ];
}
