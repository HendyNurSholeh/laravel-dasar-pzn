<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testMiddleware(): void
    {
        $response = $this->withHeaders([
            'X-API-KEY' => '123456',
        ])->get('middleware');

        $response->assertStatus(200)
                 ->assertSeeText('OK');
    }

    public function testMiddlewareUnauthorized(): void
    {
        $response = $this->withHeaders([
            'X-API-KEY' => 'wrong-key',
        ])->get('middleware');

        $response->assertStatus(401)
                 ->assertJson(['message' => 'Unauthorized']);
    }

    public function testMiddlewareWithoutHeader(): void
    {
        $response = $this->get('middleware');

        $response->assertStatus(401)
                 ->assertJson(['message' => 'Unauthorized']);
    }

    public function testMiddlewareParameter(): void{
        $response = $this->withHeaders([
            'X-API-KEY' => '123456',
        ])->get('middleware-parameter');

        $response->assertStatus(200)
                 ->assertSeeText('OK');
    }

    public function testMiddlewareCsrf(): void
    {
        $response = $this->get('middleware-csrf');

        $response->assertStatus(200)
                 ->assertSeeText('OK');
    }


    

    
    
}