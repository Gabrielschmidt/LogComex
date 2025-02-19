<?php

namespace App\Service\User;

use App\Models\Pokemon;
use Illuminate\Pagination\LengthAwarePaginator;

class PokemonService
{
    public function list(int $perPage): LengthAwarePaginator
    {
        $pokemons = Pokemon::paginate($perPage);

        return $pokemons;
    }
}
