<x-layouts.app :heading="__('Prioridades')">
    <div class="max-w-3xl mx-auto py-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-medium">Prioridades</h1>
            <a href="{{ route('priorities.create') }}"
               class="inline-flex items-center px-4 py-2 bg-[#1b1b18] text-white text-sm rounded-md hover:bg-black">
                + Nova prioridade
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 rounded-md bg-green-50 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden border border-[#e3e3e0] rounded-lg">
            <table class="w-full text-sm">
                <thead class="bg-[#FAF7F1] text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Nível</th>
                        <th class="px-4 py-3 font-medium">Nome</th>
                        <th class="px-4 py-3 font-medium text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e3e3e0]">
                    @forelse ($priorities as $priority)
                        <tr>
                            <td class="px-4 py-3">{{ $priority->level }}</td>
                            <td class="px-4 py-3">{{ $priority->name }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('priorities.edit', $priority) }}" class="text-sm text-[#1b1b18] underline">
                                        Editar
                                    </a>
                                    <form action="{{ route('priorities.destroy', $priority) }}" method="POST"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta prioridade?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-700 underline">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-center text-[#706f6c]">
                                Nenhuma prioridade cadastrada ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $priorities->links() }}
        </div>
    </div>
</x-layouts.app>