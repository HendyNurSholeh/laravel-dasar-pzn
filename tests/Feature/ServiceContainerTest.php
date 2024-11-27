<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
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

    public function testMakeObjectNotSame(): void{
        $foo1 = $this->app->make(Foo:: class);
        $foo2 = $this->app->make(Foo:: class);
        $this->assertNotSame($foo1, $foo2);
    }

    public function testBind(){
        $this->app->bind(Person::class, function ($app) {
            return new Person('John', 'Doe');
        });
        
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $this->assertNotNull($person1);
        $this->assertNotNull($person2);
        $this->assertNotSame($person1, $person2);
    }
    public function testSingleton(){
        $this->app->singleton(Person::class, function ($app) {
            return new Person('John', 'Doe');
        });
        
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $this->assertNotNull($person1);
        $this->assertNotNull($person2);
        $this->assertSame($person1, $person2);
    }
    public function testInstance(){
        $person = new Person("hendy", "nur sholeh");
        $this->app->instance(Person::class, $person);
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $this->assertSame($person1, $person2);
        $this->assertSame($person1, $person);
    }

    public function testDependencyInjeection(): void{
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });
        $foo = $this->app->make(Foo::class);
        $foo2 = new Foo();
        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        $this->assertSame($foo, $bar->foo());
        $this->assertNotSame($foo2, $bar->foo());
        $this->assertSame($bar2->foo(), $bar->foo());
        $this->assertNotSame($bar, $bar2);
    }
    
    public function testDependencyInjectionInClosure(): void{
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });
        $this->app->singleton(Bar::class, function($app){
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });
        
        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        $this->assertSame($bar, $bar2);
    }
}