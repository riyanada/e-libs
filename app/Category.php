<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function books()
    {
        return $this->hasMany('App\Books', 'categories_id');
    }
}
