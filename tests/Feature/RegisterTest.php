<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegisterTest extends TestCase
{

    /** @test */
    public function test_redirect_unauthenticated_user(): void
    {
        $response = $this->get('/products');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function test_not_authenticate_to_a_user_with_credentials_invalid(): void
    {
        $user = User::create([
            'email' => 'user@example.com',
            'name' => 'John Doe',
            'password' => 'supersecure123',
            'address' => 'mi casa en sabaneta',
            'wallet' => 122,
            'role' => 'admin',
        ]);

        $credentials = [
            "email" => "user@example.com",
            "password" => "secret"
        ];

        $this->assertInvalidCredentials($credentials);
    }
}
