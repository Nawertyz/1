<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply',
        'username',
           'text',
               'status',
        'domain',
    ];

    protected $hidden = [
        'domain'
    ];
  
}
