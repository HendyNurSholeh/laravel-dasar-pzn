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

    public function testViewWithoutRouting(): void
    {
        $this->view('hello', ['name' => 'Agus'])
            ->assertSeeText('Hallo Agus');
    }

    public function testRouteParameter(): void{
        $this->get('/products/2')
            ->assertStatus(200)
            ->assertSeeText('Product id: 2');
    }

    public function testRouteMultipleParameter(): void{
        $this->get("/products/2/items/jahe")
            ->assertStatus(200)
            ->assertSeeText('Product id: 2 and item: jahe');
    }

    public function testRouteParameterWithWhere(): void{
        $this->get("/categories/2")
            ->assertStatus(200)
            ->assertSeeText('Category id: 2');
        $this->get("/categories/ljkljio")
            ->assertSeeText("Maaf, halaman tidak ditemukan");
    }

    public function testRouteParameterWithOptional(): void{
        $this->get("/categories")
            ->assertStatus(200)
            ->assertSeeText('Category name: kosong');
        $this->get("/categories/elektronik")
            ->assertStatus(200)
            ->assertSeeText('Category name: elektronik');
    }

    public function testConflictRoute(): void{
        $this->get("/confilict/joko")
            ->assertStatus(200)
            ->assertSeeText('confilict joko');
        $this->get("/confilict/hendy")
            ->assertStatus(200)
            ->assertSeeText('confilict hendy nur sholeh');
    }

    public function testRouteName(): void{
        $this->get("categories/2")
            ->assertStatus(200)
            ->assertSeeText('Category id: 2');
        
        $this->get("products/2")
            ->assertStatus(200)
            ->assertSeeText('Category link: http://localhost/categories/2');
        
        $this->get("products-redirect/2")
            ->assertStatus(302)
            ->assertRedirect("categories/2");
    }

   




}