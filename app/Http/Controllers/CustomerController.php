<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CustomerRepository;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * GET /customers/view/$id
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function view(Request $request, Response $response)
    {
        $customer = $this->customerRepository->find($request->id);

        return response()
            ->json($customer->toArray(), 200)
            ->header('Content-Type', 'application/json');
    }
}
