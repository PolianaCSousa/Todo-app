@extends('layouts.main')



@section('body')

  <p class="h1">Todo-list</p>

  @foreach($tasks as $task)

    <div class="card mb-3">
      <div class="card-body">
      
        @if($task->isCompleted())
          <span class="badge text-bg-success">Completada</span>
        @endif

        <p>{{$task->descricao}}</p>

        <form action="{{route('tasks.update', $task->id)}}" method="POST">
          @method('PATCH')
          @csrf

          @if(!$task->isCompleted())
            <button type="submit" class="btn btn-light">Completar</button>
          @endif
        </form>

      </div>
    </div>
    
  @endforeach

  <a href="{{route('tasks.create')}}" class="btn btn-primary block">Nova Tarefa</a>

@endsection