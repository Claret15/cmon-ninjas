<?php

namespace Tests\Feature\Controllers;

use App\Models\Member;
use App\User;
use Tests\TestCase;

class MemberControllerTest extends TestCase
{
    public function testIndexAsGuestRedirectToLogin()
    {
        $response = $this->get('/members');
        $response->assertRedirect('/login');
    }

    public function testIndexAuthorised()
    {
        // Make a User model
        $user = factory(User::class)->make();

        // User model is authenticated and opens the given route
        $response = $this->actingAs($user)
            ->get('/members');

        $response->assertStatus(200);
    }

    public function testCreateMethodDisplaysViewWhenUserAuthenticated()
    {
        $user = factory(User::class)->make();

        // User model is authenticated and opens the given route
        $response = $this->actingAs($user)
            ->get('/members/create');

        $response->assertStatus(200);
        $response->assertViewIs('pages.members.create');
    }

    public function testCreateMethodRedirectsToLoginPageIfUserIsAGuest()
    {
        $response = $this->get('/members/create');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testShowMethodDisplaysMember()
    {
        $response = $this->get('/members/1');
        $response->assertStatus(200);
        $response->assertViewIs('pages.members.show');
    }

    public function testStoreMethodAuthenticatedAndCreatesAMember()
    {
        // Create a User model
        $user = factory(User::class)->make();

        // User model is authenticated and opens the given route
        $response = $this
            ->actingAs($user)
            ->json(
                'POST',
                '/members',
                [
                    "name" => "Claret",
                    "guild" => "Ninjas",
                    "is_active" => true,
                ]
            );

        $response->assertStatus(302);
        $response->assertRedirect('guilds/1');
    }

    public function testStoreMethodUnauthorisedAndDoesNotCreateAModel()
    {
        // Attempt to create model without Authentication
        $response = $this->json(
            'POST',
            '/members',
            [
                "name" => "Claret",
                "guild" => "Ninjas",
                "is_active" => true,
            ]
        );

        $response->assertStatus(401);
        $response->assertJson(["message" => "Unauthenticated."]);
    }

    public function testEditMethodDisplaysViewWhenUserAuthenticated()
    {
        // Create a User model
        $user = factory(User::class)->make();

        // User model is authenticated and opens the given route
        $response = $this->actingAs($user)
            ->get('/members/1/edit');

        $response->assertStatus(200);
        $response->assertViewIs('pages.members.edit');
    }

    public function testEditMethodRedirectsToLoginPageIfUserIsAGuest()
    {
        $response = $this->get('/members/1/edit');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testUpdateMethodAuthenticatedAndUpdatesAMember()
    {
        // Create a User model
        $user = factory(User::class)->make();

        $member = Member::where('name', 'Claret')->first();
        $updateRoute = '/members/' . $member->id;

        // User model is authenticated and opens the given route
        $response = $this
            ->actingAs($user)
            ->json(
                'PUT',
                $updateRoute,
                [
                    "id" => $member->id,
                    "name" => "Spilla",
                    "guild" => "Ninjas",
                    "is_active" => false,
                ]
            );

        $response->assertStatus(302);
        $response->assertRedirect('guilds/1');
    }

    public function testUpdateMethodAsGuestDoesNotUpdateAModel()
    {
        // Attempt to create model without Authentication
        $response = $this->json(
            'PUT',
            '/members/1',
            [
                "name" => "Spilla",
                "guild" => "Ninjas",
                "is_active" => false,
            ]
        );

        $response->assertStatus(401);
        $response->assertJson(["message" => "Unauthenticated."]);
    }

    public function testDestroyMethodAsGuest()
    {
        $member = Member::where('name', 'Spilla')->first();
        $destroyRoute = '/members/' . $member->id;

        $response = $this->json('DELETE', $destroyRoute);

        $response->assertStatus(401);
        $response->assertJson(["message" => "Unauthenticated."]);
    }

    public function testDestroyMethodAuthorised()
    {
        // Create a User model
        $user = factory(User::class)->make();

        $member = Member::where('name', 'Spilla')->first();
        $destroyRoute = '/members/' . $member->id;

        $response = $this->actingAs($user)->json('DELETE', $destroyRoute);

        $response->assertStatus(302);
        $response->assertRedirect('/guilds/1');
    }
}
