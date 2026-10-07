@php
    $priority = $priority ?? null;
@endphp

<div>
    <label for="name" class="block text-sm font-medium mb-1">Nome</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $priority?->name) }}"
           placeholder="Ex: Alta, Média, Baixa, Urgente"
           class="w-full rounded-md border border-[#e3e3e0] px-3 py-2 text-sm">
    @error('name')
        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="level" class="block text-sm font-medium mb-1">Nível</label>
    <input type="number" name="level" id="level" min="1" max="10"
           value="{{ old('level', $priority?->level) }}"
           class="w-full rounded-md border border-[#e3e3e0] px-3 py-2 text-sm">
    <p class="mt-1 text-xs text-[#706f6c]">Quanto maior o número, maior a prioridade (ex: 1 = baixa, 4 = urgente).</p>
    @error('level')
        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
    @enderror
</div>