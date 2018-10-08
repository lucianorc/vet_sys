<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
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
}
