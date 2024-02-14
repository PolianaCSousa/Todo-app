@extends('layouts.main')

@section('head')
  <title>Todo App Demo</title>
@endsection

@section('body')

@auth       
  <form action="{{route('logout')}}" method="POST">
    @csrf
      <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
  </form>
@endauth

<h1>Task List</h1>

@endsection