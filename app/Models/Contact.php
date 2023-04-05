<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
