


@csrf
<flux:input name="name" label="Name" :value="old('name', $category->name ?? '')" required maxlength="100" />
@error('name')
    <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
@enderror

<flux:textarea name="description" label="description (opcional)" rows="4" maxlength="1000">{{ old('description', $category->description ?? '') }}</flux:textarea>
@error('description')
    <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
@enderror

<div class="flex items-center gap-4">
    <flux:button type="submit" variant="primary">Salvar</flux:button>
    <a class="underline" href="{{ route('categorias.index') }}">Cancelar</a>
</div>