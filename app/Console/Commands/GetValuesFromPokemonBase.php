<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

class GetValuesFromPokemonBase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-pokemon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to list data from Pokemon api and save in local data.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $results = $this->getDataFromPokemon();

        $listToSave = [];

        foreach ($results['results'] as $result) {

            $detailsFromPokemon = $this->getTypeDataFromPokemon($result);

            $listToSave[] = [
                'name' => $result['name'],
                'type' => $detailsFromPokemon['types'][0]['type']['name'],
                'height' => $detailsFromPokemon['height'] * 100,
                'weight' => $detailsFromPokemon['weight'] / 1000
            ];
        };

        dump($listToSave);

        Pokemon::insert($listToSave);
    }

    protected function getDataFromPokemon()
    {
        $results = Http::get('https://pokeapi.co/api/v2/pokemon');
        return json_decode($results, true);
    }

    protected function getTypeDataFromPokemon(array $data)
    {
        $uriToDetailsFromPokemon = $data['url'];
        $resultFromApiPokemonDetails = Http::get($uriToDetailsFromPokemon);
        return json_decode($resultFromApiPokemonDetails, true);
    }
}
