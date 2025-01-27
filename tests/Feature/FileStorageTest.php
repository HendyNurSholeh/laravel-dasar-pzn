<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testStorage(): void
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('example.txt', 'This is a test file.');
        $this->assertTrue($filesystem->exists('example.txt'));
        $this->assertEquals('This is a test file.', $filesystem->get('example.txt'));
    }
}