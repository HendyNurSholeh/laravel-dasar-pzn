<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreateSession(): void
    {
        $this->get('/session/create')
            ->assertStatus(200)
            ->assertSeeText('Session created');
    }
}