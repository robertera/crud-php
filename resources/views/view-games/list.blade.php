<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Lista de Todos os Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="game-list">
                @foreach ($games as $game)
                <div class="game-item">
                    <h3 class="font-semibold text-white">{{ $game->name }}</h3>
                    <p class="font-semibold text-white">Genero: {{ $game->description }}</p>
                    <p class="font-semibold text-white">Data de Lançamento: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $game->release_date)->format('d/m/Y') }}</p>
                    <p class="font-semibold text-white">Preço: {{ $game->price }}</p>
                    @if ($game->user_id)
                    @php
                    $userName = \App\Models\User::where('id', $game->user_id)->value('name');
                    @endphp
                    <p class="font-semibold text-white">Catalogado por: {{ $userName }}</p>
                    @endif
                    <br>
                </div>
                @endforeach
                <button class="btn btn-primary">
                    <a href="{{route('games.index')}}">Voltar</a>
                </button>

            </div>
        </div>
    </div>
</x-app-layout>
