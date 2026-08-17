<?php

namespace Tests\Feature\Controllers;

use App\Mail\ContactRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactApiTest extends TestCase
{
    use DatabaseTransactions;

    public function testContactUsPostStoresAndEmailsTheMessage()
    {
        Mail::fake();

        $response = $this->postJson('/api/contact', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'subject' => 'Question',
            'message' => 'Hello there',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('contacts', ['email' => 'jane@example.com', 'subject' => 'Question']);
        Mail::assertSent(ContactRequest::class);
    }

    /** @dataProvider requiredFields */
    public function testContactUsPostValidatesRequiredFields(string $missingField)
    {
        Mail::fake();

        $payload = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'subject' => 'Question',
            'message' => 'Hello there',
        ];
        unset($payload[$missingField]);

        $response = $this->postJson('/api/contact', $payload);

        $response->assertStatus(422)->assertJsonValidationErrors([$missingField]);
    }

    public static function requiredFields(): array
    {
        return [['name'], ['email'], ['subject'], ['message']];
    }
}
