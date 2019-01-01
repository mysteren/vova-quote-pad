<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name',
        'author_id',
        'text',
        'date',
    ];

    /**
     * Связь с Picture
     */
    public function author()
    {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }
}
