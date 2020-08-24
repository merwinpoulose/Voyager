<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPriceCalculation()
    {
        $response1 = $this->post('/calculate-price', ['product_name' => ['A','B','C','D','A','B','A']]);
        $response1->assertStatus(200)
                ->dump();

        $response2 = $this->post('/calculate-price', ['product_name' => ['C', 'C','C','C','C','C','C']]);
        $response2->assertStatus(200)
                ->dump();

        $response3 = $this->post('/calculate-price', ['product_name' => ['A', 'B','C','D']]);
        $response3->assertStatus(200)
                ->dump();
    }
}
