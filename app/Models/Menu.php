<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'page', 'v', 'order'];
    protected $casts = [
        'v' => 'boolean',
    ];
}
