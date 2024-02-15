@extends('layouts.main')



@section('body')

  <p class="h1">Todo-list</p>

  @foreach($tasks as $task)

    <div class="card mb-3">
      <div class="card-body">
        <p>{{$task->descricao}}</p>
        <a href="#" class="btn btn-light">Completar</a>
      </div>
    </div>
    
  @endforeach

  <a href="{{route('tasks.create')}}" class="btn btn-primary block">Nova Tarefa</a>

@endsection