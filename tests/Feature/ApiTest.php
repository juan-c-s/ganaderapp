<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_api_valid_json_body_products(): void
    {
        $this->assertJson($this->get('/api/products')->getContent());
    }

    /** @test */
    public function test_api_valid_json_body_events(): void
    {
        $this->assertJson($this->get('/api/events')->getContent());
    }
}
