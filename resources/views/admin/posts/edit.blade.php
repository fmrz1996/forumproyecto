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
          <a href="/admin/posts">Posts</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
      </ol>

      @include('admin.common.errors')

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Post #{{ $post->id }}</div>
        <div class="card-body">
          <form id="form" action="{{ url("admin/posts/detalles/{$post->id}") }}" method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-group">
                <div class="form-label-group">
                  <input name="title" type="text" id="inputTitle" class="form-control" value="{{ old('title', $post->title) }}" placeholder="Título" required="required">
                  <label for="inputTitle">Título</label>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select class="form-control" name="category_id">
                      <option value="0">Seleccione una categoría...</option>
                      @foreach ($categorias as $category)
                        <option value="{{ $category->id }}" @if($errors->any()) {{ old('category_id') == $category->id ? 'selected=selected' : '' }} @else {{ $category->id == $post->category->id ? 'selected=selected' : '' }} @endif>
                          {{ $category->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="slug" type="text" id="inputSlug" class="form-control" placeholder="URL" value="{{ old('slug', $post->slug) }}" required="required" minlegth="5" maxlegth="255">
                    <label for="inputSlug">URL</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input name="background" type="file" id="inputBackground" value="{{ old('background') }}"></input>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea name="header" type="text" class="form-control" placeholder="Encabezado" rows="4" maxlength="300">{{ old('header', $post->header) }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea name="body" id="textBody" class="form-control" required="required">{{ old('body', $post->body) }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                  @foreach ($tags as $tag)
                    <option value="{{ $tag->name }}"
                      @foreach ($post->tags as $tagofpost)
                          {{ $tagofpost->name == $tag->name ? "selected=selected" : '' }}
                        @endforeach
                        >
                      {{ $tag->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
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
      $('.select2-multi').select2({
        tags: true,
        language: "es",
        maximumInputLength: 30,
        maximumSelectionLength: 7
      });
      $('select').on(
        'select2:close',
            function(){
                $(this).focus();
            }
      );
    </script>

    <script type="text/javascript">
      CKEDITOR.replace('textBody', {
        contentsCss: [CKEDITOR.basePath + 'contents.css', '../../../css/bootstrap.min.css'],
        allowedContent: true,
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
      });
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
