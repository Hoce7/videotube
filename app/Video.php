<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function categorie()
    {
        return $this->hasMany('App\Categorie', 'category_id');
    }
}