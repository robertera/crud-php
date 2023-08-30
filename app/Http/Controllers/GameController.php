<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;


class GameController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $games = Game::all();
        return view('view-games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
        return view('view-games.create');
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreGameRequest $request
     * @return \Illuminate\Http\Response
     */
    /**Observe que aqui o Request foi personalizado devido a criacao do Model utilizando o --all
     * Assim, ele verifica se o usuario tem autorizacao para realizar a requisicao no arquivo
     * StoreNoticiaRequest. Isso tambem vale para o update
     */
    //public function store(Request $request)
    public function store(StoreGameRequest $request){
        $novogame = new Game();
        $novogame->name = $request->name;
        $novogame->description = $request->description;
        $novogame->release_date = $request->release_date;
        $novogame->price = $request->price;
        $novogame->user_id = auth()->user()->id;

        $novogame->save();

        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game){
        //
        return view('view-games.show', compact(['game']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game){
        //
        return view('view-games.edit', compact(['game']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(updateGameRequest $request, Game $game){
        //
        $game->name = $request->name;
        $game->description = $request->description;
        $game->release_date = $request->release_date;
        $game->price = $request->price;
        $game->save();

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game){
        //
        $game = Game::find($game->id);

        if(!isset($game)){
            $msg = 'Não há [game] para excluir com o identificador [$game->id], registrado no banco de dados!';
            $link = 'view-games.index';
            return view('games.erroid', compact('msg', 'link'));
        }

        Game::destroy($game->id);
        return redirect()->route('games.index');
    }
}
