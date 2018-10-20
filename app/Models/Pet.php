<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';

    protected $fillable = [
        'name', 'specie', 'race'
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
