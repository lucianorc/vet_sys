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

    public function delete($id)
    {
        $this->customer->find($id)->delete();
    }

    public function update($id, $data)
    {
        $this->customer->find($id)->update($data);
    }

    public function getPetsByCustomer($id)
    {
        return $this->customer->with('pets')->find($id);
    }
}