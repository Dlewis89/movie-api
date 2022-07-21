<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class MovieTest extends TestCase
{
    use RefreshDatabase;

    private array $movie = [
        'name' => 'Insidious',
        'release_year' => 2010,
        'rating' => 'R'
    ];

    private array $newMovie = [
        'name' => 'Insidious Chapter 2',
        'release_year' => 2013,
        'rating' => 'R'
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->db_movie = Movie::create($this->movie);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_movies(): void
    {
        $response = $this->getJson('api/v1/movies')
            ->assertStatus(200);
        $this->assertJson($response->getContent());
    }

    public function test_get_a_movie(): void {
        $response = $this->getJson('api/v1/movies/1')
            ->assertStatus(200);
        $this->assertJson($response->getContent());
    }

    public function test_add_a_new_movie(): void
    {
        $this->post('api/v1/movies', $this->newMovie)
            ->assertStatus(201);
        $this->assertDatabaseHas('movies', $this->newMovie);
    }

    public function test_update_a_movie(): void
    {
        $this->patch('api/v1/movies/'. $this->db_movie->id, [
            'name' => 'Insidious Chapter 2'
        ])->assertStatus(200);

        $this->assertDatabaseHas('movies', [
            'name' => 'Insidious Chapter 2'
        ]);
    }

    public function test_delete_a_movie(): void
    {
        $this->delete('api/v1/movies/'. $this->db_movie->id)
            ->assertStatus(200);

        $this->assertDatabaseMissing('movies', [
            'name' => $this->db_movie
        ]);
    }
}
