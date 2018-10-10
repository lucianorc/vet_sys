<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository // implements RepositoryInterface
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
}