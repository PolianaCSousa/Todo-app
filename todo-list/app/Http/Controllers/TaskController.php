<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function home(){
        $user = Auth::user();
        $dados['nome']  = $user->name;

        return view('inicio', $dados);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //ele ordena os que estao com completed_at, os demais que sao null so pega na ordem que estiverem no bd. Ai depois ele ordena por id em ordem decrescente (exceto os que ja foram ordenados pelo completed_at - logo ordena todos os que não foram completados, que sao os que não foram ordenados antes também)
        $dados['tasks'] = Task::orderBy('completed_at')->orderBy('id', 'desc')->get();
    
        return view('tasks.index', $dados); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required', 'max:300'],
        ],[
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.max'      => 'A descrição deve conter no máximo 300 caracteres.']);

        try{
            DB::beginTransaction();

            $task = new Task();
            $task->descricao = $request->descricao;
            $task->save();

            DB::commit();

        }catch(Exception $e){
            DB::rollBack();
        }

        return redirect()->route('tasks.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try{
            DB::beginTransaction();

            $task = Task::findOrFail($id);
            $task->completed_at = Carbon::now();
            $task->save();

            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        
        return redirect()->route('tasks.index');
    }
}
