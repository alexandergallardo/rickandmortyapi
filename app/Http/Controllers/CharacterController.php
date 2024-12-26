<?php

namespace App\Http\Controllers;


use App\Models\CharacterResponse;
use App\Models\ResponseInfo;
use App\Services\RickAndMortyApiService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CharacterController extends Controller
{

    /**
     * @var RickAndMortyApiService
     */
    private $characters;

    private $responseInfo;

    private $pagedResponse;

    const FILTERS = ['name', 'status', 'species', 'gender'];
    public function __construct(RickAndMortyApiService $characters)
    {

        $this->characters = $characters;
        $this->responseInfo = new ResponseInfo(0, 0);
        $this->pagedResponse = new CharacterResponse($this->responseInfo, []);
    }

    /**
     * Mostrar los personajes
     *
     * @return Application|Factory|View
     */
    public function showAll(Request $request)
    {
        $pagedResponse = $this->pagedResponse;
        $page = $this->getPage($request);
        $filters = $this->getFilters($request);

        try {
            $pagedResponse = $this->characters->getCharacters($page, $filters);
        } catch (Exception $ex) {
            Log::error('Failed to retrieve characters!');
        }

        return view('characters', compact('pagedResponse', 'page', 'filters'));
    }

    /**
     * Muestra un personaje por ID
     *
     * @param $id
     *
     * @return Application|Factory|View
     */
    public function showDetail($id)
    {
        try {
            $character = $this->characters->getCharacterById($id);

        } catch (Exception $ex) {
            abort(404); // Personaje no encontrado
        }

        return view('character', compact('character'));
    }

    /**
     * Devuelve un array con los filtros qeu se encuentran en el request
     * @return array<string, string>
     */
    protected function getFilters(Request $request): array
    {
        $filters = [];

        foreach ($this::FILTERS as $filter) {
            $filterValue = $request->input($filter, null);
            if ($filterValue != null && trim($filterValue) != '') {
                $filters[$filter] = $filterValue;
            }
        }

        return $filters;
    }

    /**
     * Devuelve la representacion numerica de la pagina si esta presente en el request.
     */
    protected function getPage(Request $request): int
    {
        $page = 1;

        if (is_numeric($request->input('page', 1))) {
            $page = (int) $request->input('page', 1);
        }

        return $page;
    }
}
