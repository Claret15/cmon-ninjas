<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePageLoadsCorrectly()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
