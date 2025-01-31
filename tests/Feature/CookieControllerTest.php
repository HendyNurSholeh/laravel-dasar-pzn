<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSetCookie(): void
    {
        $this->post('cookie/set')
            ->assertStatus(200)
            ->assertCookie('name', 'Hendy');
    }

    public function testGetCookie(): void
    {
        $this->withCookie('name', 'Hendy')
            ->get('cookie/get')
            ->assertStatus(200)
            ->assertJson(['name' => 'Hendy']);
    }

    

}