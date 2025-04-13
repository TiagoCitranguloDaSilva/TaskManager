<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{

    public function index()
    {
        return view("listarTarefas", ['tarefas' => TaskResource::collection(Task::all())]);
    }

    public function create()
    {
        return view("formularioTarefa");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "status" => "required|in:pendente,em andamento,concluído",
        ], [
            "title.required" => "O título é obrigatório",
            "status.required" => "O status é obrigatório",
            "status.in" => "opção inválida"
        ]);

        Task::create([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "due_date" => $request->dueDate
        ]);


        return redirect("/api/tasks")->with('mensagemProcesso', 'Tarefa salva com sucesso');

    }


    public function show(string $id)
    {
        $task = Task::find($id);
        if($task == null){
            return redirect('/api/tasks')->withErrors(['idTarefaInvalido' => 'Tarefa não encontrada']);
        }

        return view("mostrarDadosTarefa", ["tarefa"=> (new TaskResource($task))->toArray(request())]);

    }

    public function edit(string $id)
    {
        $task = Task::find($id);
        if($task == null){
            return redirect('/tasks')->withErrors(['idTarefaInvalido' => 'Tarefa não encontrada']);
        }

        return view('formularioTarefa', ['tarefa' => $task]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required",
            "status" => "required|in:pendente,em andamento,concluído",
        ], [
            "title.required" => "O título é obrigatório",
            "status.required" => "O status é obrigatório",
            "status.in" => "opção inválida"
        ]);

        $task = Task::find($id);
        if($task == null){
            return redirect('/api/tasks')->withErrors(['idTarefaInvalido' => 'Tarefa não encontrada']);
        }
        
        if($task->status != "pendente" && $request->status == "pendente"){
            return back()->withErrors(["tarefaPendenteErro" => "Tarefas não podem voltar a serem pendentes"]);
        }

        foreach($request->all() as $campo => $valor){
            if($task->$campo != $valor && $campo != 'status' && $task->status != 'pendente'){
                return redirect('/api/tasks')->withErrors(["tarefaPendenteErro" => "Apenas tarefas pendentes podem ter seus dados editados"]);
            }
        }


        Task::where('id', $id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "due_date" => $request->dueDate
        ]);

        return redirect('/api/tasks')->with("mensagemProcesso", "Tarefa editada com sucesso");

    }

    public function destroy(string $id)
    {
        $task = Task::find($id);
        if($task == null){
            return redirect('/api/tasks')->withErrors(['idTarefaInvalido' => 'Tarefa não encontrada']);
        }

        if($task->status != "pendente"){
            return redirect('/api/tasks')->withErrors(["tarefaPendenteErro" => "Apenas tarefas pendentes podem ser excluídas"]);
        }

        Task::where("id", $id)->delete();

        return redirect("/api/tasks")->with('mensagemProcesso', 'Tarefa excluída com sucesso');

    }
}
