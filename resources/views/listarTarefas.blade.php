<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <style>
        #popUpMensagem{
            display: none;
        }
    </style>
</head>
<body>
    <h1>Lista de tarefas</h1>
    <button onclick="window.location.href ='/api/newTask'">Nova tarefa</button>
    <ul>
        @forelse ($tarefas as $tarefa)
            <li>
                <a href="/api/mostrar/{{ $tarefa->id }}">{{$tarefa->title}}</a>
                <a href="/api/editar/{{$tarefa->id}}">Editar</a>
                <button onclick="mensagemConfirmacao({{ $tarefa->id }})">Excluir</a>
            </li>
        @empty
            <li>Não há tarefas</li>
        @endforelse
    </ul>
    @session('mensagemProcesso')
        <p>{{session('mensagemProcesso')}}</p>
    @endsession

    @error('tarefaPendenteErro')
        <p>{{ $message }}</p>
    @enderror

    @error('idTarefaInvalido')
        <p>{{ $message }}</p>
    @enderror

    <div id="popUpMensagem">
        <p>Tem certeza que deseja apagar esta tarefa?</p>
        <div id="botoes">
            <form action="" method="post" id="formMensagem">
                @method("delete")
                @csrf
                <input type="hidden" name="id" value="" id="idTarefa">
                <input type="submit" value="Apagar">
            </form>
            <button onclick="cancelar()">Cancelar</button>
        </div>
    </div>
</body>
<script>

    function mensagemConfirmacao(id){
        document.getElementById("popUpMensagem").style.display = 'flex'
        document.getElementById("formMensagem").action = `/api/tasks/${id}`
        document.getElementById("idTarefa").value = id
    }

    function cancelar(){
        document.getElementById("popUpMensagem").style.display = 'none'
    }


</script>
</html>