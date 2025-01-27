<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHello(): void
    {
        $this->get('/hello')
            ->assertStatus(200)
            ->assertSeeText('Hallo Hendy');
    }

    public function testHelloService(): void
    {
        $this->get('/hello/indonesia')
            ->assertStatus(200)
            ->assertSeeText('Halo indonesia');
    }
}