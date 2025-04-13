<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova tarefa</title>
</head>
<body>
    @isset($tarefa->id)
        <form action="/api/tasks/{{ $tarefa->id }}" method="post" autocomplete="off">
            @method("put")
    @else
        <form action="/api/tasks" method="post" autocomplete="off">
    @endisset
        @csrf
        <p><label for="title">Titulo: </label><input type="text" name="title" id="title" required value="{{ $tarefa->title ?? null }}"></p>
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <p><label for="description">Descrição: </label><textarea name="description" id="description" cols="30" rows="10" value="{{ $tarefa->description ?? null }}"></textarea></p>
        <p>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="pendente" {{ isset($tarefa) && $tarefa->status == "pendente" ? "selected" : '' }}>Pendente</option>
                <option value="em andamento" {{ isset($tarefa) && $tarefa->status == "em andamento" ? "selected" : '' }}>Em andamento</option>
                <option value="concluído" {{ isset($tarefa) && $tarefa->status == "concluído" ? "selected" : '' }}>Concluído</option>
            </select>
        </p>
        @error('status')
            <p>{{ $message }}</p>
        @enderror
        <p><label for="dueDate">Data de vencimento: </label><input type="date" name="dueDate" id="dueDate" value="{{ $tarefa->due_date ?? null }}"></p>
        <input type="submit" value="Salvar">
    </form>
    @error('tarefaPendenteErro')
        <p>{{ $message }}</p>
    @enderror
</body>
</html>