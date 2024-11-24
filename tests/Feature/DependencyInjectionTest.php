<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Foo;
use App\Data\Bar;


class DependencyInjectionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testFooBar(): void{
        $foo = new Foo();
        $bar = new Bar($foo);
        $this->assertEquals("foo", $foo->foo()); 
        $this->assertEquals("foo and Bar", $bar->bar()); 
    }
    
    public function testDependencyInjection(): void{
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $this->assertEquals("foo", $foo->foo()); 
        $this->assertEquals("foo and Bar", $bar->bar()); 
    }
}