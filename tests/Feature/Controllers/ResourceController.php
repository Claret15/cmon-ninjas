<?php

namespace Tests\Feature\Controllers;

use App\User;
use Tests\TestCase;

class ResourceController extends TestCase
{
    protected $user;
    public $routeIndex;
    public $routeCreate;
    public $viewCreate;
    public $viewEdit;
    public $routeEdit;
    public $routeShow;
    public $viewShow;
    public $createPayload;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->make();
    }

    public function testCreateMethodAuthorised()
    {
        // User model is authenticated and opens the given route
        $response = $this->actingAs($this->user)
            ->get($this->routeCreate);

        $response->assertStatus(200);
        $response->assertViewIs($this->viewCreate);
    }

    public function testCreateMethodGuest()
    {
        $response = $this->get($this->routeCreate);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testEditMethodAuthorised()
    {
        // User model is authenticated and opens the given route
        $response = $this->actingAs($this->user)
            ->get($this->routeEdit);

        $response->assertStatus(200);
        $response->assertViewIs($this->viewEdit);
    }

    public function testEditMethodGuest()
    {
        $response = $this->get($this->routeEdit);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testShowMethod()
    {
        $response = $this->get($this->routeShow);
        $response->assertStatus(200);
        $response->assertViewIs($this->viewShow);
    }

    public function testStoreMethodGuest()
    {
        // Attempt to create model without Authentication
        $response = $this->json(
            'POST',
            $this->routeIndex,
            $this->createPayload
        );

        $response->assertStatus(401);
        $response->assertJson(["message" => "Unauthenticated."]);
    }

    public function testUpdateMethodGuest()
    {
        // Attempt to create model without Authentication
        $response = $this->json(
            'PUT',
            $this->routeShow,
            $this->createPayload
        );

        $response->assertStatus(401);
        $response->assertJson(["message" => "Unauthenticated."]);
    }

    public function testDestroyMethodGuest()
    {
        // Attempt to create model without Authentication
        $response = $this->json(
            'DELETE',
            $this->routeShow
        );

        $response->assertStatus(401);
        $response->assertJson(["message" => "Unauthenticated."]);
    }
}
