<?php

namespace Globali\Teacher;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'image', 'address', 'phone', 'email', 'nationality', 'state', 'post_code', 'experience', 'specialized_subject', 'assigned_subject',
    ];
}
