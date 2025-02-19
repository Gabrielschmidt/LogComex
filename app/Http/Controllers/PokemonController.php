<?php

namespace App\Http\Controllers;

use App\Service\User\PokemonService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function __construct(
        protected PokemonService $pokemonService,
    ) {
    }

    public function list(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $response = $this->pokemonService->list($perPage);

        return response()->json([
            'message' => 'Pokemons capturados com sucesso!',
            'body' => $response
        ]);
    }
}
