<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testConfigContoh(): void
    {
        $firstName = config('contoh.name.first');
        $lastName = config('contoh.name.last');
        $debug = config('contoh.debug');
        $this->assertEquals('Muhammad', $firstName);
        $this->assertEquals('Iqbal', $lastName);
        $this->assertTrue(condition: $debug);
    }
}