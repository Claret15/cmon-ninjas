<?php

namespace Tests\Feature\Controllers;

use App\Models\League;

class LeagueControllerTest extends ResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->routeIndex = '/leagues';
        $this->routeCreate = '/leagues/create';
        $this->viewCreate = 'pages.league.create';
        $this->routeEdit = '/leagues/1/edit';
        $this->viewEdit = 'pages.league.edit';
        $this->routeShow = '/leagues/1';
        $this->viewShow = 'pages.league.show';
        $this->createPayload = ['name' => 'Champions'];
    }

    public function testIndex()
    {
        $response = $this->get($this->routeIndex);
        $response->assertRedirect('/login');
    }

    public function testIndexRedirectedToHome()
    {
        $response = $this->get($this->routeIndex);
        $response->assertRedirect('/login');
    }

    public function testIndexMethodAuthorised()
    {
        // User model is authenticated and opens the given route
        $response = $this->actingAs($this->user)
            ->get($this->routeIndex);

        $response->assertStatus(200);
        $response->assertViewIs('pages.league.index');
    }

    public function testShowMethod()
    {
        $response = $this->get($this->routeShow);
        $response->assertStatus(302);
    }

    public function testShowMethodDisabledRedirectToHome()
    {
        $response = $this->get($this->routeShow);
        $response->assertRedirect('/');
    }

    public function testStoreMethodAuthorised()
    {
        $response = $this
            ->actingAs($this->user)
            ->json(
                'POST',
                $this->routeIndex,
                $this->createPayload
            );

        $response->assertStatus(302);
        $response->assertRedirect($this->routeIndex);
    }

    public function testUpdateMethodAuthorised()
    {
        $league = League::where('name', $this->createPayload['name'])->first();
        $updatePayload = ['id' => $league->id, 'name' => 'Inferior'];
        $updateRoute = '/leagues/' . $league->id . '/';

        // User model is authenticated and can update a guild model
        $response = $this
            ->actingAs($this->user)
            ->json(
                'PUT',
                $updateRoute,
                $updatePayload
            );

        $response->assertStatus(302);
        $response->assertRedirect($this->routeIndex);
    }

    public function testDestroyMethodAuthorised()
    {
        $league = League::where('name', 'Inferior')->first();
        $destroyRoute = '/leagues/' . $league->id;

        $response = $this
            ->actingAs($this->user)
            ->json(
                'DELETE',
                $destroyRoute
            );

        $response->assertStatus(302);
        $response->assertRedirect($this->routeIndex);
    }
}
