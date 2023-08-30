<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Adicione de game novo ao catalogo!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->
        <form method="post" action="{{ route('games.store')}}">
            @csrf
            <div class="form-grup">
                <label for="text" class="font-semibold text-white">Nome</label>
                <input type="text" class="form-control" name="name" id="name">
                <br>
                <label for="text" class="font-semibold text-white">Descricao</label>
                <input type="text" class="form-control" name="description" id="description">
                <br>
                <label for="date" class="font-semibold text-white">Data de Lancamento</label>
                <input type="date" class="form-control" name="release_date" id="release_date">
            </div>

            <button class="btn btn-primary">Criar</button>
            <button class="btn btn-secondary">
                <a href="{{route('games.index')}}">Voltar</a>
            </button>
        </form>

        <!-- conteudo -->
        </div>
    </div>
</x-app-layout>
