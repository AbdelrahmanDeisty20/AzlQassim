<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'cat', 'summary', 'content', 'img', 'status', 'date'];
}
