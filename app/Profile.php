<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = ['name', 'no_telp', 'alamat', 'tempat_lahir', 'tgl_lahir', 'bio', 'pp', 'users_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
