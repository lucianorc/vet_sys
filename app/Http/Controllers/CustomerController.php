<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }


    /**
     * GET /customers
     *
     * @param Request $request
     * @return void
     */
    public function getIndex(Request $request)
    {
        $customers = $this->customerRepository->all();

        return view('customers.index', ['customers' => $customers]);
    }
}
