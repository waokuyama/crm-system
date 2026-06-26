<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    public function test_general_user_cannot_access_create(): void
    {
        $user = User::factory()->create([
            'role' => 'general',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/customers/create');

        $response->assertStatus(403);
    }
}
