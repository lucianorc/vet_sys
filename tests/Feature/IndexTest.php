<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
    /**
     * Test if access Index Page return status code 200
     *
     * @return void
     */
    public function testIfGetIndexPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test if has customer page link on Index Page
     * 
     * @return void
     */
    public function testIfHasCustomerLink()
    {
        $response = $this->get('/');

        $response->assertSeeText('Clientes');
    }

    /**
     * Test if has attendance page link on Index Page
     * 
     * @return void
     */
    public function testIfHasAttendanceLink()
    {
        $response = $this->get('/');

        $response->assertSeeText('Atendimento');
    }
}
