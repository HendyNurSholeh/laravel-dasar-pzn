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
            ->assertSeeText( 'hendy@gmail.com')
            ->assertHeader('Content-Type', 'application/json');
    }

    public function testResponseWithView(): void
    {
        $this->get('response/response-with-view')
            ->assertStatus(200)
            ->assertSeeText('Hallo Hendy');
    }

    public function testResponseWithJson(): void
    {
        $this->get('response/response-with-json')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson(['name' => 'Hendy']);
    }

    public function testResponseWithFile(): void
    {
        $this->get('response/response-with-file')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'image/jpeg');
    }

    public function testResponseWithDownload(): void
    {
        $this->get('response/response-with-download')
            ->assertDownload('avatar.jpg')
            ->assertStatus(200);
    }


}