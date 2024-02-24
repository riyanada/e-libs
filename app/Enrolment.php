<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    protected $table = 'users_enrolment';
    protected $fillable = ['users_id', 'role_id'];
}
