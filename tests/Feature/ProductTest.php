<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_guardar_product(){
        $response = $this->post('/api/products', [
            'name' => 'carne',
            'price'=> 200
        ]);

        //vammos a retornar una esctructura del producto en formato Json
        $response->assertJsonStructure(["name","price"])
        ->assertJson(['name'=>'carne'])
        ->assertStatus(201);

        $this->assertDatabaseHas('products', ['name'=>'carne','price'=>200]);
    }

}

