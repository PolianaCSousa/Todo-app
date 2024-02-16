@extends('layouts.main')



@section('body')

  <p class="h1">Todo-list</p>

  @foreach($tasks as $task)

    <div class="card mb-3 @if($task->isCompleted()) border-success @endif">
      <div class="card-body" >
      
        @if($task->isCompleted())
          <span class="badge text-bg-success">Completada</span>
        @endif

        <p>{{$task->descricao}}</p>

        @if(!$task->isCompleted())

          <form action="{{route('tasks.update', $task->id)}}" method="POST">
            @method('PATCH')
            @csrf

            <button type="submit" class="btn btn-light">Completar</button>
          </form>

        @else
        
          <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-outline-danger">Excluir Tarefa</button>
          </form>

        @endif

      </div>
    </div>
    
  @endforeach

  <a href="{{route('tasks.create')}}" class="btn btn-primary block">Nova Tarefa</a>

@endsection