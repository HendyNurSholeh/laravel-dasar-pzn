<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testResponse(): void
    {
        $this->post('response/response')
            ->assertStatus(200)
            ->assertSeeText('Hello World');

    }

    public function testResponseWithHeader(): void
    {
        $this->post('response/response-with-header')
            ->assertStatus(200)
            ->assertSeeText('Hendy')
            ->assertSeeText(value: 'hendy@gmail.com')
            ->assertHeader(headerName: 'Content-Type', 'application/json');
    }
}