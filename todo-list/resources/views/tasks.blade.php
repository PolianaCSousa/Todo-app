@extends('layouts.main')

@section('body')
@auth
          
  <form action="{{route('logout')}}" method="POST">
    @csrf
      <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
  </form>
@endauth



<h1>Hello tasks app</h1>

@endsection