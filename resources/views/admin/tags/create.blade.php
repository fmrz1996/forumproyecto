    @extends('admin.layout')

    @section('stylesheet')
    <link rel="stylesheet" href="../../../css/adminpanel/select2.min.css">
    @endsection

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/tags">Tags</a>
        </li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>

      @include('admin.common.errors')

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Crear tags
        </div>
        <div class="card-body">
          <form class="" action="{{ url('admin/tags/crear') }}" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                <div class="form-label-group">
                  <label for="tags[]">Tags</label>
                  <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            <button class="btn btn-primary btn-block" type="submit">Crear tag</button>
          </form>
        </div>
      </div>
      @endsection

      @section('script')
        <script src="../../../js/adminpanel/select2.min.js"></script>
        <script src="../../../js/adminpanel/select2-es.js"></script>
        <script type="text/javascript">
          $('.select2-multi').select2({
            tags: true,
            language: "es",
            maximumInputLength: 30
          });
        </script>
      @endsection
