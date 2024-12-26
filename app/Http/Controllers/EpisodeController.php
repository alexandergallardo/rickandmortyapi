<?php

namespace App\Http\Controllers;

use App\Services\RickAndMortyApiService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EpisodeController extends Controller
{
    /**
     * @var RickAndMortyApiService
     */
    private $episodes;

    public function __construct(RickAndMortyApiService $episodes)
    {

        $this->episodes = $episodes;
    }

    /**
     * Muestra un episodio por ID
     *
     * @param $id
     *
     * @return Application|Factory|View
     */
    public function showDetail($id)
    {
        try {
            $episode = $this->episodes->getEpisodeById($id);
        } catch (Exception $ex) {
            abort(404); // Episodio no encontrado
        }

        return view('episode', compact('episode'));
    }
}
