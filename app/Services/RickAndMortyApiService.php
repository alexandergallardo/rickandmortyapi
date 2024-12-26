<?php

namespace App\Services;

use App\Models\Episode;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RickAndMortyApiService
{
    private $endpoint;

    public function __construct()
    {
        $this->endpoint = config('app.api_test_uri');
    }

    /**
     * Obtener personajes
     *
     * @return mixed
     * @throws Exception
     */
    public function getCharacters(int $page = 1, array $filters = [])
    {
        $characterEndpoint = $this->endpoint.'/character';
        $query = array_merge(compact('page'), $filters);

        try {
            $response = Http::timeout(10)->retry(3, 500)->get($characterEndpoint, $query);
        } catch (Exception $e) {
            Log::error('Failed to connect to the API: '.$e->getMessage());
            throw $e;
        }

        return json_decode($response->throw()->body());
    }

    /**
     * Obtener personaje por ID
     *
     * @param $id
     *
     * @return mixed
     * @throws Exception
     */
    public function getCharacterById($id)
    {
        $characterEndpoint = $this->endpoint.'/character/'.$id;

        try {
            $response = Http::timeout(10)->retry(3, 500)->get($characterEndpoint, []);
        } catch (Exception $e) {
            Log::error('Failed to connect to the API: '.$e->getMessage());
            throw $e;
        }

        return json_decode($response->throw()->body());
    }

    /**
     * Devuelve un episodio por ID
     * @return Episode
     * @throws Exception
     */
    public function getEpisodeById(int $id)
    {
        $episodesEndpoint = $this->endpoint.'/episode/'.$id;

        try {
            $response = Http::timeout(10)->retry(3, 500)->get($episodesEndpoint, []);
        } catch (Exception $e) {
            Log::error('Failed to connect to the API: '.$e->getMessage());
            throw $e;
        }

        return json_decode($response->throw()->body());
    }
}
