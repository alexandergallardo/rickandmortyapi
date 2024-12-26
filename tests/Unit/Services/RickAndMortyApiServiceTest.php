<?php

namespace Tests\Unit\Services;

use App\Services\RickAndMortyApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class RickAndMortyApiServiceTest extends TestCase
{
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RickAndMortyApiService();
    }

    public function testGetCharacters()
    {
        Http::fake([
            '*/character*' => Http::response(['results' => [], 'info' => []], 200)
        ]);

        $response = $this->service->getCharacters();

        $this->assertIsObject($response);
    }

    public function testGetCharacterById()
    {
        $characterId = 1;
        Http::fake([
            '*/character/'.$characterId => Http::response(['id' => $characterId, 'name' => 'Rick Sanchez'], 200)
        ]);

        $response = $this->service->getCharacterById($characterId);

        $this->assertIsObject($response);
        $this->assertEquals($characterId, $response->id);
        $this->assertEquals('Rick Sanchez', $response->name);
    }

    public function testGetEpisodeById()
    {
        $episodeId = 1;
        Http::fake([
            '*/episode/'.$episodeId => Http::response(['id' => $episodeId, 'name' => 'Pilot'], 200)
        ]);

        $response = $this->service->getEpisodeById($episodeId);

        $this->assertIsObject($response);
        $this->assertEquals($episodeId, $response->id);
        $this->assertEquals('Pilot', $response->name);
    }

    public function testGetCharactersHandlesException()
    {
        Http::fake([
            '*/character*' => Http::response(null, 500)
        ]);

        Log::shouldReceive('error')->once();

        $this->expectException(\Exception::class);

        $this->service->getCharacters();
    }

    public function testGetCharacterByIdHandlesException()
    {
        $characterId = 1;
        Http::fake([
            '*/character/'.$characterId => Http::response(null, 500)
        ]);

        Log::shouldReceive('error')->once();

        $this->expectException(\Exception::class);

        $this->service->getCharacterById($characterId);
    }

    public function testGetEpisodeByIdHandlesException()
    {
        $episodeId = 1;
        Http::fake([
            '*/episode/'.$episodeId => Http::response(null, 500)
        ]);

        Log::shouldReceive('error')->once();

        $this->expectException(\Exception::class);

        $this->service->getEpisodeById($episodeId);
    }
}