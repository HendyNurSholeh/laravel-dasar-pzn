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

    public function testRedirectRoute(): void
    {
        $this->get('redirect/route')
            ->assertStatus(302) 
            ->assertRedirect('redirect/hello/Hendy');
    }

    public function testRedirectAction(): void
    {
        $this->get('redirect/action')
            ->assertStatus(302)
            ->assertRedirect('hello/Hendy');
    }
}