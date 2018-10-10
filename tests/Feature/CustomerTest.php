<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Customer as CustomerController;

class CustomerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test if GET Customer Page return status code 200
     *
     * @return void
     */
    public function testIfGetCustomerPage()
    {
        $response = $this->get('/customers');

        $response->assertStatus(200);
    }

    /**
     * Test if GET Customer Index Page render index HTML script
     *
     * @return void
     */
    public function testIfIndexPageRenderTemplate()
    {
        $response = $this->get('/customers');

        $response->assertViewIs('customers.index');
    }

    /**
     * Test if GET Customer Index Page has Create Button
     *
     * @return void
     */
    public function testIfIndexPageHasCreateButton()
    {
        $response = $this->get('/customers');

        $response->assertSeeText('Criar cliente');
    }

    /**
     * Test if GET /customers has a customers table
     */
    public function testIfIndexPageHasTable()
    {
        $response = $this->get('/customers');

        $response->assertSeeInOrder([
            '<table',
            '</table>'
        ]);
    }

    /**
     * Test if /customers/create gets 200 status code
     *
     * @return void
     */
    public function testIfGetsCreatePage()
    {
        $response = $this->get('/customers/create');

        $response->assertStatus(200);
    }

    /**
     * Test if Customer factory works
     *
     * @return void
     */
    public function testCustomerCreation()
    {
        $customer = factory(CustomerController::class)->create([
            'name' => 'John Doe'
        ]);

        $this->assertDatabaseHas('customers', ['name' => 'John Doe']);
    }

}
