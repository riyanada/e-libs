<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookHistory extends Model
{
    protected $fillable = [
        'books_id', 'users_id', 'status', 'created_at', 'updated_at'
    ];

    public function book()
    {
        return $this->belongsTo('App\Books', 'books_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'categories_id');
    }
}
