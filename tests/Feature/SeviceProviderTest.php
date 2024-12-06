<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Service\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeviceProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testServiceProvider(): void
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        $this->assertSame($foo1, $foo2);
        $this->assertSame($bar1, $bar2);
        $this->assertSame($bar1->foo(), $foo1);
    }

    public function testHelloService(): void
    {
        $helloService = $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);
        $this->assertEquals("Halo Indonesia", $helloService->hello("Indonesia"));
        $this->assertSame($helloService, $helloService2);
    }

    public function testEmpty(): void{
        $this->assertTrue(true);
    }
}
