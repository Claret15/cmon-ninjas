<?php

namespace Tests\Feature\Controllers;

use App\Models\Guild;

class GuildControllerTest extends ResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->routeIndex = '/guilds';
        $this->routeCreate = '/guilds/create';
        $this->viewCreate = 'pages.guilds.create';
        $this->routeEdit = '/guilds/1/edit';
        $this->viewEdit = 'pages.guilds.edit';
        $this->routeShow = '/guilds/1';
        $this->viewShow = 'pages.guilds.show';
        $this->createPayload = ['name' => 'Assassins'];
    }

    public function testIndexMethodRedirectedToLogin()
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
        $response->assertViewIs('pages.guilds.index');
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
        $guild = Guild::where('name', $this->createPayload['name'])->first();
        $updatePayload = ['id' => $guild->id, 'name' => 'Expendables'];
        $updateRoute = '/guilds/' . $guild->id . '/';

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
        $guild = Guild::where('name', 'Expendables')->first();
        $destroyRoute = '/guilds/' . $guild->id;

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
