<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    protected $customer;

    public function __construct()
    {
        $this->customer = new Customer;
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