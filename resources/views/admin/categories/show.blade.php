  @extends('admin.layout')

  @section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/admin/categorias">Categorías</a>
      </li>
      <li class="breadcrumb-item active">Detalles</li>
    </ol>

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Categoría #{{ $category->id }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Nombre:</th>
                  <td>{{ $category->name }}</td>
                </tr>
                <tr>
                  <th>Estado:</th>
                  @if($category->is_active == 1)
                    <td>Activo</td>
                  @else
                    <td>Inactivo</td>
                  @endif
                </tr>
                <tr>
                  <th>Fecha de creación:</th>
                  <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                  <th>Ultima modificación:</th>
                  <td>{{ $category->updated_at }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  @endsection
