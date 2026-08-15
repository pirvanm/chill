<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testRegisterCreatesAUser()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'secret123',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['email' => 'jane@example.com']);
        $this->assertTrue(Hash::check('secret123', \App\Models\User::where('email', 'jane@example.com')->first()->password));
    }

    public function testLoginReturnsATokenForValidCredentials()
    {
        $this->makeUser(['email' => 'jane@example.com', 'password' => Hash::make('secret123')]);

        $response = $this->postJson('/api/auth/login', [
            'email' => 'jane@example.com',
            'password' => 'secret123',
        ]);

        $response->assertStatus(200)->assertJsonStructure(['token']);
    }

    public function testLoginRejectsWrongPassword()
    {
        $this->makeUser(['email' => 'jane@example.com', 'password' => Hash::make('secret123')]);

        $response = $this->postJson('/api/auth/login', [
            'email' => 'jane@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertJsonPath('errors.email.0', 'Something wrong please try again');
    }

    public function testLoginRejectsUnknownEmail()
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => 'nobody@example.com',
            'password' => 'secret123',
        ]);

        $response->assertStatus(409);
    }

    public function testMeEndpointRejectsASanctumTokenBecauseItUsesTheTokenGuardNotSanctum()
    {
        // Real, currently-live inconsistency between auth mechanisms: LoginController issues a
        // Laravel Sanctum token (`createToken()->plainTextToken`), but GET /api/me is guarded by
        // `auth:api`, and config/auth.php's "api" guard driver is "token" (Laravel's built-in
        // simple token guard, which checks a raw `api_token` column) -- not "sanctum". A token
        // from /auth/login therefore authenticates against /auth/user (`auth:sanctum`, tested
        // below) but NOT against /me. Documenting this rather than silently picking a fix, since
        // choosing which guard is "correct" here is a product/architecture call.
        $this->makeUser(['email' => 'jane@example.com', 'password' => Hash::make('secret123')]);
        $token = $this->postJson('/api/auth/login', [
            'email' => 'jane@example.com',
            'password' => 'secret123',
        ])->json('token');

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->getJson('/api/me');

        $response->assertStatus(401);
    }

    public function testAuthUserEndpointAcceptsASanctumTokenFromLogin()
    {
        $user = $this->makeUser(['email' => 'jane@example.com', 'password' => Hash::make('secret123')]);
        $token = $this->postJson('/api/auth/login', [
            'email' => 'jane@example.com',
            'password' => 'secret123',
        ])->json('token');

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->getJson('/api/auth/user');

        $response->assertStatus(200)->assertJsonPath('id', $user->id);
    }

    public function testLogoutIsReachableWithoutAuthentication()
    {
        // No auth middleware on this route at all -- auth()->logout() is called on the default
        // (web/session) guard regardless of who's asking, and always returns 200 with no body.
        $response = $this->postJson('/api/auth/logout');

        $response->assertStatus(200);
    }
}
