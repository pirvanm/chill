<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class SocialLoginApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testFbLoginRedirectsToFacebook()
    {
        $provider = Mockery::mock();
        $provider->shouldReceive('stateless')->andReturnSelf();
        $provider->shouldReceive('redirect')->andReturn(redirect('https://facebook.com/dialog/oauth?client_id=1'));
        Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

        $response = $this->get('/api/social-login/facebook');

        $response->assertStatus(302);
        $this->assertStringContainsString('facebook.com', $response->headers->get('Location'));
    }

    public function testFbCallbackLogsInAnExistingUserByEmail()
    {
        $existing = $this->makeUser(['email' => 'jane@example.com']);

        $socialiteUser = Mockery::mock();
        $socialiteUser->shouldReceive('getEmail')->andReturn('jane@example.com');
        $provider = Mockery::mock();
        $provider->shouldReceive('stateless')->andReturnSelf();
        $provider->shouldReceive('user')->andReturn($socialiteUser);
        Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

        $response = $this->getJson('/api/social-login/facebook/callback');

        $response->assertStatus(200)
            ->assertJsonPath('user.id', $existing->id)
            ->assertJsonStructure(['token']);
    }

    public function testFbCallbackCreatesANewUserWhenEmailIsUnknown()
    {
        $socialiteUser = Mockery::mock();
        $socialiteUser->shouldReceive('getEmail')->andReturn('newperson@example.com');
        $socialiteUser->shouldReceive('getName')->andReturn('New Person');
        $socialiteUser->token = 'fb-token-abc';
        $provider = Mockery::mock();
        $provider->shouldReceive('stateless')->andReturnSelf();
        $provider->shouldReceive('user')->andReturn($socialiteUser);
        Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

        $response = $this->getJson('/api/social-login/facebook/callback');

        $response->assertStatus(200)->assertJsonStructure(['token']);
        $this->assertDatabaseHas('users', ['email' => 'newperson@example.com']);
    }
}
