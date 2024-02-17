@extends('layouts.main')

@section('body')

<div class="container">
  @guest 
    <p class="h1">Bem vindo ao Todo-list!</p>
  @endguest
  @auth
    <p class="h1">{{$nome}}, bem vindo(a) ao Todo-list!</p>
  @endauth
</div>


@endsection