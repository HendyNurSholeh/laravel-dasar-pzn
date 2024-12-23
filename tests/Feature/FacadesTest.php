<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class FacadesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testFacades(): void
    {
        $firstName = config('contoh.name.first');
        $firstName2 = Config::get('contoh.name.first');
        $this->assertSame($firstName, $firstName2);
    }

    public function testDependency(): void{
        $config = $this->app->make("config");
        $firstName1 =$config->get("contoh.name.first");
        $firstName2 = Config::get("contoh.name.first");
        $this->assertSame($firstName1, $firstName2);
    }

    public function testMockDependency(): void{
        Config::shouldReceive("get")
            ->with("contoh.name.first")
            ->andReturn("Muhammad");
        $firstName = Config::get("contoh.name.first");
        $this->assertEquals("Muhammad", $firstName);
    }
}
