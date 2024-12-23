<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testBasicRouting(): void
    {
        $this->get('/hendy')
            ->assertStatus(200)
            ->assertSeeText('hendy nur sholeh');
    }

    public function testRedirect(): void{
        $this->get('/sholeh')
            ->assertStatus(302)
            ->assertRedirect('/hendy');
    }

    public function testFallback(): void{
        $this->get('/notfound')
            ->assertSeeText('Maaf, halaman tidak ditemukan');
        $this->get('/malez')
            ->assertSeeText('Maaf, halaman tidak ditemukan');
        $this->get('/kamusiapa')
            ->assertSeeText('Maaf, halaman tidak ditemukan');
    }
}
