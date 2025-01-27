<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHello(): void
    {
        // $this->get(uri: 'input/hello?name=Hendy')
        //     ->assertStatus(200)
        //     ->assertSeeText('Halo Hendy');

        // post
        $this->post('input/hello', ['name' => ['first'=>'Hendy']])
            ->assertStatus(200)
            ->assertSeeText('Halo Hendy');
    }
}