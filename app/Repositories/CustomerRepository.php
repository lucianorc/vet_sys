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

    public function create($customer)
    {
        $this->customer->name = $customer->name;
        $this->customer->address = $customer->address;
        $this->customer->birthday = $customer->birthday;
        $this->customer->phone = $customer->phone;
        $this->customer->email = $customer->email;

        $this->customer->save();
    }
}