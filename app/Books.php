<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'author', 'tahun_terbit', 'penerbit', 'abstrak', 'file_ebook', 'thumbnail', 'categories_id'];
    public $timestamps = true;

    public function categories()
    {
        return $this->belongsTo('App\Category', 'categories_id');
    }
}
