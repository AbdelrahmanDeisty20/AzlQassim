<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name', 'oldP', 'newP', 'feats', 'feat', 'status'];
    protected $casts = [
        'feat' => 'boolean',
    ];
}
