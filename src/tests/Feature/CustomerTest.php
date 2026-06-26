<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function test_customer_index_can_be_displayed(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/customers');

        $response->assertStatus(200);
    }
}
