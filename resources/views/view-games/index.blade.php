<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{__('Lista de Games no Catalogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::check())
            <div style="margin-bottom:2%;">
                <button type="button" class="btn btn-outline-primary">
                    <a href="{{ route('games.create') }}">Adicionar jogo ao catalogo</a>
                </button>
            </div>
            @endif
            <!--<ul class="list-group">-->
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
                                <!--can('atualizar', $game)-->
                                <div style="margin-right:2%;">
                                    <button type="button" class="btn btn-outline-success">
                                        <a href="{{ route('games.edit', $game) }}">Editar</a>
                                    </button>
                                </div>
                                <!--endcan-->

                                <!--can('view', $game)-->
                                <div style="margin-right:2%;">
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="{{ route('games.show', $game) }}">Visualizar</a>
                                    </button>
                                </div>
                                <!--endcan-->
                                @endauth
                            </div>
                        </td>
                        <!--</li>-->

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
