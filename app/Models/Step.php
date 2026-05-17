<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['num', 'icon', 'title', 'desc', 'img'];
}
