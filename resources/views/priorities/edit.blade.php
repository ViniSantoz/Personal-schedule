<x-layouts.app :heading="__('Editar prioridade')">
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-xl font-medium mb-6">Editar prioridade</h1>

        <form action="{{ route('priorities.update', $priority) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            @include('priorities.partials.form')

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('priorities.index') }}" class="px-4 py-2 text-sm rounded-md border border-[#e3e3e0]">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 text-sm rounded-md bg-[#1b1b18] text-white hover:bg-black">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>