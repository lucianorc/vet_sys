<?php

namespace App\Repositories;

use App\Models\Pet;

class PetRepository
{
    protected $pet;

    public function __construct()
    {
        $this->pet = new Pet;
    }

    public function all()
    {
        return $this->customer->all();
    }

    public function find($id)
    {
        return $this->customer->find($id);
    }
}