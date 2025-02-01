<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRedirect(): void
    {
        $this->get('redirect/redirect-from')
            ->assertStatus(302) 
            ->assertRedirect('redirect/redirect-to');
    }
}