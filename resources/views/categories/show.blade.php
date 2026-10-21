<x-layouts::app title="Detalhes da categoria">
    <section lang="pt-BR" class="mx-auto w-full max-w-4xl space-y-6">
        <h1 class="text-2xl font-semibold">Detalhes da categoria</h1>

        <p><strong>Código:</strong> {{ $category->id }}</p>
        <p class="break-words"><strong>Nome:</strong> {{ $category->name }}</p>
        <p class="whitespace-pre-wrap break-words"><strong>Descrição:</strong> {{ $category->description ?? 'Sem descrição' }}</p>
        <div class="flex flex-wrap items-center gap-4">
            <flux:button :href="route('categorias.edit', $category)">Editar</flux:button>
            <a class="underline" href="{{ route('categorias.index') }}">Voltar</a>
        </div>
    </section>
</x-layouts::app>