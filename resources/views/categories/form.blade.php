@csrf
<p>
    <label for="name">Nome</label><br>
    <input type="text" id="name" name="name"
        value="{{ old('nome', $category->name ?? '') }}" required maxlength="100">
</p>
@error('name')
    <p role="alert">{{ $message }}</p>
@enderror

<p>
    <label for="description">Descrição (opcional)</label><br>
    <textarea id="description" name="description" rows="4" cols="40" maxlength="1000">{{ old('description', $category->description ?? '') }}</textarea>
</p>
@error('description')
    <p role="alert">{{ $message }}</p>
@enderror

<button type="submit">Salvar</button>
<a href="{{ route('categories.index') }}">Cancelar</a>