<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo App Demo</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-secondary">
  <div class="container-fluid">
    <a href="{{route('home')}}" class="navbar-brand">Todo-list</a>
    <div>
      <div class="navbar-nav">
        @auth
          <a href="{{route('tasks.index')}}" class="nav-link">Todas as tarefas</a>
          <a href="{{route('tasks.create')}}" class="nav-link">Criar tarefa</a>
          <form action="{{route('logout')}}" method="POST">
            @csrf
              <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();this.closest('form').submit();"> Sair</a>
          </form>
        @endauth
        @guest
          <a href="{{route('login')}}" class="nav-link">Entrar</a>
          <a href="{{route('register')}}" class="nav-link">Registrar-se</a>
        @endguest
      </div>
    </div>
  </div>
</nav>

  <div class="container">
    @yield('body')
  </div>
  



  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
  @stack('scripts')

</body>
</html>