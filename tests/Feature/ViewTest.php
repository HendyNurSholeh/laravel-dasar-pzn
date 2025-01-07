<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    
    public function testView(): void
    {
        $this->get('/hello')
            ->assertStatus(200)
            ->assertSeeText('Hallo Hendy');
    }
    public function testNestedView(): void
    {
        $this->get('/hello-word')
            ->assertStatus(200)
            ->assertSeeText('Hallo Word Hendy');
    }
}