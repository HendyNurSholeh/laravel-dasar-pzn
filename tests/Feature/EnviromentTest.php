<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnviromentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetEnvSuccess(): void
    {
        $url = env("PUBLIC_URL");

        $this->assertEquals("www.hendy.com", $url);
    }
    
    public function testGetEnvDefault(): void
    {
        $url = env("PUBLIC_URL_DEFAULT", "default.com");
        $this->assertEquals("default.com", $url);
    }

}