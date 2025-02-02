<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCurrent(): void
    {
        $this->get('/url/current')
            ->assertStatus(200)
            ->assertSeeText('http://localhost:8000/url/current');
    }

    public function testUrlNamedRoute(): void
    {
        $this->get('/url/route-name')
            ->assertStatus(200)
            ->assertSeeText('http://localhost:8000/categories/123');
    }
}