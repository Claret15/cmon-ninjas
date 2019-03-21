<?php

namespace Tests\Feature\Controllers;

use App\Models\EventType;

class EventTypeControllerTest extends ResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->routeIndex = '/event_types';
        $this->routeCreate = '/event_types/create';
        $this->viewCreate = 'pages.eventtype.create';
        $this->routeEdit = '/event_types/1/edit';
        $this->viewEdit = 'pages.eventtype.edit';
        $this->routeShow = '/event_types/1';
        $this->viewShow = 'pages.eventtype.show';
        $this->createPayload = [
            'name' => 'Chaos',
        ];
    }

    public function testIndexMethodAsGuest()
    {
        $response = $this->get($this->routeIndex);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testIndexMethodAuthorised()
    {
        // User model is authenticated and opens the given route
        $response = $this->actingAs($this->user)
            ->get($this->routeIndex);

        $response->assertStatus(200);
        $response->assertViewIs('pages.eventtype.index');
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
        $eventType = EventType::where('name', $this->createPayload['name'])->first();
        $updatePayload = [
            'id' => $eventType->id,
            'name' => 'Racing',
        ];

        $updateRoute = '/event_types/' . $eventType->id . '/';

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
        $eventType = EventType::where('name', 'Racing')->first();
        $destroyRoute = '/event_types/' . $eventType->id;

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
