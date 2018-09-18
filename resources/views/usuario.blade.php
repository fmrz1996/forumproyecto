<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de Usuarios</title>
  </head>
  <body>
    <h1>{{ $titulo }}</h1>

    @if (!empty($usuario))
    <ul>
      @foreach ($usuarios as $usuario)
        <li>{{ $usuarios }}</li>
      @endforeach
    </ul>
    @else
      <p>No hay usuarios registrados.</p>
    @endif
  </body>
</html>
