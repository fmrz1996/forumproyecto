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
      <div class="card-body">
        <form id="form" action="{{ url('admin/posts/crear') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <input name="title" type="text" id="inputTitle" class="form-control" placeholder="Título" value="{{ old('title') }}" required="required" maxlength="150">
                <label for="inputTitle">Título</label>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select class="form-control" name="category_id">
                    <option value="0">Seleccione una categoría...</option>
                    @foreach ($categorias as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected=selected' : '' }}> {{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="slug" type="text" id="inputSlug" class="form-control" placeholder="URL" value="{{ old('slug') }}" required="required" minlegth="5" maxlegth="255">
                  <label for="inputSlug">URL</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="background" type="file" id="inputBackground" value="{{ old('background') }}" accept="image/x-png,image/gif,image/jpeg"></input>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <textarea name="header" type="text" class="form-control" placeholder="Encabezado" rows="4" maxlength="300">{{ old('header') }}</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <textarea id="textBody" name="body" class="form-control">{{ old('body') }}</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <select class="form-control select2-multi" name="tags[]" multiple="multiple">
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
      $('.select2-multi').on('change', function() {
        var data = $(".select2 option:selected").text();
        $("#test").val(data);
      });
    </script>

    <script type="text/javascript">
      CKEDITOR.replace('textBody');
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
