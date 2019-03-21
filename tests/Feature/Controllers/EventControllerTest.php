<?php

namespace Tests\Feature\Controllers;

use App\Models\Event;

class EventControllerTest extends ResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->routeIndex = '/events';
        $this->routeCreate = '/events/create';
        $this->viewCreate = 'pages.events.create';
        $this->routeEdit = '/events/1/edit';
        $this->viewEdit = 'pages.events.edit';
        $this->routeShow = '/events/1';
        $this->viewShow = 'pages.events.show';
        $this->createPayload = [
            'name' => 'Testing Event',
            'event_date' => '2019-03-14',
            'event_type_id' => 1,
        ];
    }

    public function testIndexMethod()
    {
        $response = $this->get($this->routeIndex);
        $response->assertStatus(200);
    }

    public function testIndexMethodAuthorised()
    {
        // User model is authenticated and opens the given route
        $response = $this->actingAs($this->user)
            ->get($this->routeIndex);

        $response->assertStatus(200);
        $response->assertViewIs('pages.events.index');
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
        $event = Event::where('name', $this->createPayload['name'])->first();
        $updatePayload = [
            'id' => $event->id,
            'name' => 'Dev Event',
            'event_date' => '2019-03-15',
            'event_type_id' => 1,
        ];

        $updateRoute = '/events/' . $event->id . '/';

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
        $event = Event::where('name', 'Dev Event')->first();
        $destroyRoute = '/events/' . $event->id;

        $response = $this
            ->actingAs($this->user)
            ->json(
                'DELETE',
                $destroyRoute
            );

        $response->assertStatus(302);
        $response->assertRedirect($this->routeIndex);
    }

    public function testGuildMethod()
    {
        $response = $this->get('/guilds/1/events');
        $response->assertStatus(200);
        $response->assertViewIs('pages.events.guild');
    }
}
