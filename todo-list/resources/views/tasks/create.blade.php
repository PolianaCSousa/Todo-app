@extends('layouts.main')

@section('body')

<p class="h1">Nova Tarefa</p>
<form action="#" method="POST">
  @csrf
  <div class="form-group mb-3">
    <label for="descrição">Descrição da Tarefa</label>
    <input type="text" class="form-control" name="descricao">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-outline-primary">Criar Tarefa</button>
  </div>
</form>




@endsection