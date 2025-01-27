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

    public function testInputType(): void
    {
        $this->post('input/type', [
            'name' => 'Hendy',
            'age' => '30',
            'is_active' => '1',
            'price' => '100.5',
            'married' => '2021-08-01',
        ])
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Hendy',
                'age' => 30,
                'is_active' => true,
                'price' => 100.5,
                'married' => '01-08-2021',
            ]);
    }

    public function testInputFilterOnly(): void
    {
        $this->post('input/filter-only', [
            'name' => 'Hendy',
            'age' => '30',
            'is_active' => '1',
            'price' => '100.5',
            'married' => '2021-08-01',
        ])
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Hendy',
                'age' => 30,
            ]);
    }

    public function testInputFilterExcept(): void
    {
        $this->post('input/filter-except', [
            'name' => 'Hendy',
            'age' => '30',
            'is_active' => '1',
            'price' => '100.5',
            'married' => '2021-08-01',
        ])
            ->assertStatus(200)
            ->assertJson([
                'is_active' => true,
                'price' => 100.5,
                'married' => '2021-08-01',
            ]);
    }
    
}