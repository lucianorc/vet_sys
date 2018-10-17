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

    /**
     * GET /customers/create
     * POST /customers/create
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function create(Request $request, Response $response)
    {
        if($request->isMethod('GET')) {
            return view('customers.create');
        } elseif ($request->isMethod('POST')) {
            $this->customerRepository->create($request);
            return redirect(route('customers.index'));
        }
    }

    /**
     * DELETE /customers/delete
     *
     * @param Request $request
     * @param $id
     * @return $void
     */
    public function delete(Request $request)
    {
        $this->customerRepository->delete($request->id);
        return redirect(route('customers.index'));
    }
}
