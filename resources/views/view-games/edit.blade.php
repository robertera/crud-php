<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Game em Catalogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->

        <form method="post" action="{{ route('games.update', $game) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome" class="font-semibold text-white">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $game->name }}">
                <br>
                <label for="descricao" class="font-semibold text-white">Descricao</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $game->description }}">
                <br>
                <label for="dataLancamento" class="font-semibold text-white">Data de Lancamento</label>
                <input type="date" class="form-control" name="dataLancamento" id="dataLancamento" value="{{ $game->release_data }} ">
            </div>

            <button class="btn btn-primary">Editar</button>
            <button class="btn btn-secondary">
                <a href="{{route('games.index')}}">Voltar</a>
            </button>

        </form>

        <!-- conteudo -->
        </div>
    </div>
</x-app-layout>
