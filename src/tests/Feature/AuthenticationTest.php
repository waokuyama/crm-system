<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_login_screen_can_be_displayed(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_customers_redirect_when_guest(): void
    {
        $response = $this->get('/customers');

        $response->assertRedirect('/login');
    }
}
