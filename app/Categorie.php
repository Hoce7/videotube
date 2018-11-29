<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}