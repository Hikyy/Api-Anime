<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;


class AnimeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            'title' => 'SAO',
            'Synopsis' => 'SAO',
            'Score' => "8",
            'Image' => 'SAO'
        ];


        $response = $this->postJson('/api/addAnime', $data); 
        $response
            ->assertStatus(201);

    }

    public function test_getAllAnime(){
        $response = $this->getJson('/api/product'); 
        dd(Product::all);
        
        $response->assertJsonStructure([
            'data' => [
                  '*' => [
                     'id',
                     'title',
                     'Synopsis',
                     'Score',
                     'Image',
                 ]
               ]
         ]);

        
    }

    public function test_updateAnime(){


        $response = $this -> patchJson('/api/product');
    }

}
