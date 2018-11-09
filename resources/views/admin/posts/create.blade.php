    @extends('admin.layout')

    @section('stylesheet')
    <link rel="stylesheet" href="../../../css/adminpanel/select2.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endsection

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/posts">Posts</a>
        </li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>

      @include('admin.common.errors')

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Nuevo post
      </div>
      <div class="card-body">
        <form id="form" action="{{ url('admin/posts/crear') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <label for="inputTitle">Título</label>
                <input name="title" type="text" id="inputTitle" class="form-control" placeholder="Escriba un título..." value="{{ old('title') }}" required="required" maxlength="150">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group pr-2">
                  <label for="selectCategory">Categoría</label>
                  <select class="form-control" name="category_id" id="selectCategory">
                    <option value="0">Seleccione una categoría...</option>
                    @foreach ($categorias as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected=selected' : '' }}> {{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group pl-2">
                  <label for="inputSlug">URL</label>
                  <input name="slug" type="text" id="inputSlug" class="form-control" placeholder="Escriba una URL amigable..." value="{{ old('slug') }}" required="required" minlegth="5" maxlegth="255">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputBackground">Imagen de fondo</label>
              <input name="background" type="file" id="inputBackground" value="{{ old('background') }}" accept="image/x-png,image/gif,image/jpeg"></input>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputHeader">Encabezado</label>
              <textarea name="header" id="inputHeader" type="text" class="form-control" placeholder="Escriba un encabezado..." rows="4" maxlength="300">{{ old('header') }}</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="textBody">Contenido</label>
              <textarea id="textBody" name="body" class="form-control">{{ old('body') }}</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="selectTags">Tags</label>
              <select class="form-control select2-multi" name="tags[]" id="selectTags" multiple="multiple">
                @foreach ($tags as $tag)
                  <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Crear post</button>
        </form>
      </div>
    </div>
  @endsection

  @section('script')
    <script src="../../../js/adminpanel/select2.min.js"></script>
    <script src="../../../js/adminpanel/select2-es.js"></script>
    <script src="../../../js/adminpanel/ckeditor/ckeditor.js"></script>
    <script src="../../../js/adminpanel/ckeditor/ckeditor-es.js"></script>

    <script type="text/javascript">
      $('.select2-simple').select2({

      });
      $('.select2-multi').select2({
        tags: true,
        language: "es",
        maximumInputLength: 30
      });
    </script>

    <script type="text/javascript">
      CKEDITOR.replace('textBody');
    </script>

    <script>
    $('input#inputTitle').change(function() {
      var str = slugify($(this).val());
      $('#inputSlug').val(str);
    });

    function slugify(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
    }

    </script>

    <script>
      var formChanged = false;

      $("#form :input").change(function() {
          formChanged = true;
      });

      $(window).on("beforeunload", function() {
        if(formChanged == true){
          return "Es posible que los cambios no se guarden.";
        }
      });
      $(document).ready(function() {
        $("#form").on("submit", function(e) {
          $(window).off("beforeunload");
          return true;
        });
      });
    </script>
  @endsection
