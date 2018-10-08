<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getIndex(Request $request)
    {
        return view('customers.index');
    }
}
