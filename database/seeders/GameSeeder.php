<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
        static $nome = [
        'The Last of Us',
        'God of War',
        'Uncharted',
       ];

        static $descricao = [
        'Jogo de sobrevivência',
        'Jogo de ação',
        'Jogo de aventura',
       ];

       static $preco = [
        100.00,
        200.00,
        300.00,
       ];


        static $dataLancamento = [
          '2013-06-14',
          '2018-04-20',
          '2007-11-19',
        ];

        static $userId = [
          1,
          2,
          3,
        ];

    public function run(): void
    {
        for($i = 0; $i < count(self::$nome); $i++) {
            $game = Game::create([
                Game::CAMPO_NAME => self::$nome[$i],
                Game::CAMPO_DESCRIPTION => self::$descricao[$i],
                Game::CAMPO_PRICE => self::$preco[$i],
                Game::CAMPO_RELEASE_DATE => self::$dataLancamento[$i],
                Game::CAMPO_USER_ID => self::$userId[$i],
            ]);
            $game->save();
        }
    }
}
