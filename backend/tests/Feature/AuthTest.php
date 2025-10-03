<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create roles
        Role::firstOrCreate(["name" => "admin"]);
        Role::firstOrCreate(["name" => "teacher"]);
        Role::firstOrCreate(["name" => "student"]);
    }

    /** @test */
    public function a_user_can_register()
    {
        $response = $this->postJson("/api/register", [
            "name" => "Test User",
            "email" => "test@example.com",
            "password" => "password",
            "password_confirmation" => "password",
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(["message", "access_token", "token_type"]);

        $this->assertDatabaseHas("users", [
            "email" => "test@example.com",
        ]);
    }

    /** @test */
    public function a_user_can_login()
    {
        $user = User::factory()->create([
            "email" => "login@example.com",
            "password" => Hash::make("password"),
        ]);

        $response = $this->postJson("/api/login", [
            "email" => "login@example.com",
            "password" => "password",
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(["message", "access_token", "token_type"]);
    }

    /** @test */
    public function authenticated_user_can_access_user_info()
    {
        $user = User::factory()->create();
        $token = $user->createToken("auth_token")->plainTextToken;

        $response = $this->withHeaders([
            "Authorization" => "Bearer " . $token,
        ])->getJson("/api/user");

        $response->assertStatus(200)
                 ->assertJson(["email" => $user->email]);
    }

    /** @test */
    public function authenticated_user_can_logout()
    {
        $user = User::factory()->create();
        $token = $user->createToken("auth_token")->plainTextToken;

        $response = $this->withHeaders([
            "Authorization" => "Bearer " . $token,
        ])->postJson("/api/logout");

        $response->assertStatus(200)
                 ->assertJson(["message" => "Logged out successfully"]);

        // Verify token is revoked (attempt to access protected route)
        $response = $this->withHeaders([
            "Authorization" => "Bearer " . $token,
        ])->getJson("/api/user");

        $response->assertStatus(401);
    }
}

