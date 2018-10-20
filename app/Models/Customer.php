<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name', 'email', 'birthday', 'address', 'phone'
    ];

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }
}
