<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{__('Lista de Games no Catalogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::check())
            <div style="display: flex; margin-bottom: 2%;">
            @can('create_game', 'app/Models/Game')
            <div style="margin-right: 10px;">
                <button type="button" class="btn btn-outline-primary">
                    <a href="{{ route('games.create') }}">Adicionar jogo ao catalogo</a>
                </button>
            </div>
            @endcan
            @can('list_game', 'app/Models/Game')
            <div style="margin-bottom:2%;">
                <button type="button" class="btn btn-outline-primary">
                    <a href="{{ route('games.list') }}">Listar todos os Games</a>
                </button>
            </div>
            </div>
            @endcan
            @endif
            <!--<ul class="list-group">-->
            @can('create_game', 'app/Models/Game')
            <table class="table text-white">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descricao</th>
                        <th scope="col">Data de Lancamento</th>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Acoes</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($games as $game)
                    <tr>
                        <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                        <th scope="row">{{$game -> id}}</th>
                        <td>{{$game -> name}}</td>
                        <td>{{$game -> description}}</td>
                        <td>{{$game -> release_date}}</td>
                        <td>{{$game -> user_id}}</td>
                        <td>

                            <div style="display:flex">
                                @auth
                                <!--can('delete', $game)-->
                                @can('delete_game', $game)
                                @if (auth()->user()->hasRole('admin') || auth()->user()->id === $game->user_id)
                                <div style="margin-right:2%;">
                                    <form method="post" action="{{ route('games.destroy', $game->id) }}" onsubmit="return confirm('Tem certeza que deseja EXCLUIR {{addslashes($game->nome) }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                                <!--endcan-->
                                @endif
                                @endcan
                                <!--can('atualizar', $game)-->
                                @can('update_game', $game)
                                @if (auth()->user()->hasRole('admin') || auth()->user()->id === $game->user_id)
                                <div style="margin-right:2%;">
                                    <button type="button" class="btn btn-outline-success">
                                        <a href="{{ route('games.edit', $game) }}">Editar</a>
                                    </button>
                                </div>
                                <!--endcan-->
                                @endif
                                @endcan

                                <!--can('view', $game)-->
                                @can('view_game', $game)
                                <div style="margin-right:2%;">
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="{{ route('games.show', $game) }}">Visualizar</a>
                                    </button>
                                </div>
                                <!--endcan-->
                                @endcan
                                @endauth
                            </div>
                        </td>
                        <!--</li>-->

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</x-app-layout>
