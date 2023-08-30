<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Descricoes dos Jogos em catalogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->

            <div>
                <h1 class="font-semibold text-white">{{ $game->name }}</h1>
                <br>
                <h3 class="font-semibold text-white">{{ $game->description}}</h3>
                <br>
                <h3 class="font-semibold text-white">R$ {{ $game->price}}</h3>
                <br>
                <h3 class="font-semibold text-white">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $game->release_date)->format('d/m/Y') }}</h3>
            </div>

            <br>
            <button class="btn btn-primary">
                <a href="{{route('games.index')}}">Voltar</a>
            </button>

        <!-- conteudo -->
        </div>
    </div>
</x-app-layout>
