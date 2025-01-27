<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUpload(): void
    {
        $this->post('file/upload', ['file' => UploadedFile::fake()->image('avatar.jpg')])
            ->assertStatus(200)
            ->assertSeeText('files/avatar.jpg');
    }
}