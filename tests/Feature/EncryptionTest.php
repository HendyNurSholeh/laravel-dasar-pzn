<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testEncryptDecrypt(): void
    {
        $encryption = Crypt::encrypt('Hendy Nur Sholeh');
        $decryption = Crypt::decrypt($encryption);
        $this->assertEquals('Hendy Nur Sholeh', $decryption);
    }
}