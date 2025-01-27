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
        $this->get(uri: 'input/hello?name=Hendy')
            ->assertStatus(200)
            ->assertSeeText('Halo Hendy');

        // post
        $this->post('input/hello', ['name' => ['first'=>'Hendy']])
            ->assertStatus(200)
            ->assertSeeText('Halo Hendy');
    }

    public function testInputAllJson(): void
    {
        $this->post('input/all', ['name' => 'Hendy'])
            ->assertStatus(200)
            ->assertSeeText("name")
            ->assertSeeText("Hendy")
            ->assertExactJson(['name' => 'Hendy']);
    }

    public function testInputArray(): void
    {
        $this->post('input/array', ['products' => [['name' => 'Hendy', 'middle'=>'sholeh'], ['name' => 'Nur']]])
            ->assertStatus(200)
            ->assertSeeText('Hendy')
            ->assertSeeText('Nur');
    }

    public function testInputQuery(): void
    {
        $this->get('input/query?name=Hendy')
            ->assertStatus(200)
            ->assertSeeText('Hendy');
        $this->post('input/query?name=Hendy')
            ->assertStatus(200)
            ->assertSeeText('Hendy');

    }
    
}