<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testDependencyInjection(): void{
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $this->assertEquals("foo", $foo->foo()); 
        $this->assertEquals("foo and Bar", $bar->bar()); 
    }
}