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
        <li class="breadcrumb-item active">Crear</li>
      </ol>

      @include('admin.common.errors')

    <div class="card card-register mx-auto mt-5 mb-5">
      <div class="card-header">
        Nuevo post
      </div>
      <div class="card-body">
        <form id="form" action="{{ url('admin/posts/crear') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label for="inputTitle">Título</label>
                  </div>
                  <div class="col-md-2">
                    <span id="rc-1" class="remaining-char float-right"></span>
                  </div>
                </div>
                <input name="title" type="text" id="inputTitle" class="form-control" placeholder="Escribe un título..." value="{{ old('title') }}" required="required" maxlength="150">
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
                  <div class="form-row">
                    <div class="col-md-10">
                      <label for="inputSlug">URL</label>
                    </div>
                    <div class="col-md-2">
                      <span id="rc-2" class="remaining-char float-right"></span>
                    </div>
                  </div>
                  <input name="slug" type="text" id="inputSlug" class="form-control" placeholder="Escribe una URL amigable..." value="{{ old('slug') }}" required="required" minlegth="5" maxlength="191">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group pr-2">
                    <label for="selectCategory">Estilo</label>
                    <select class="form-control" name="style" id="selectStyle">
                      <option value="1">Clásico</option>
                      <option value="2">Panorámico</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group pl-2">
                    <label for="inputBackground">Imagen de fondo</label>
                    <input name="background" type="file" id="inputBackground" value="{{ old('background') }}" accept="image/x-png,image/gif,image/jpeg"></input>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <div class="form-row">
                <div class="col-md-10">
                  <label for="inputHeader">Encabezado</label>
                </div>
                <div class="col-md-2">
                  <span id="rc-3" class="remaining-char float-right"></span>
                </div>
              </div>
              <textarea name="header" id="inputHeader" type="text" class="form-control" placeholder="Escribe un encabezado..." rows="4" maxlength="300">{{ old('header') }}</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="textBody">Contenido</label>
              <textarea id="textBody" name="body" class="form-control" placeholder="Escribe un texto... se original!">{{ old('body') }}</textarea>
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
      $('.select2-multi').select2({
        tags: true,
        language: "es",
        placeholder: "Escribe los tags aquí...",
        maximumInputLength: 30,
        maximumSelectionLength: 15
      });
    </script>

    <script type="text/javascript">
      CKEDITOR.on('instanceReady', function (ev) {
          ev.editor.dataProcessor.htmlFilter.addRules({
              elements : {
                  img: function( el ) {

                      el.addClass('img-fluid');
                      var style = el.attributes.style;

                      if (style) {
                          var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                              width = match && match[1];

                          match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                          var height = match && match[1];

                          if (width) {
                              el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                              el.attributes.width = width;
                          }

                          if (height) {
                              el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                              el.attributes.height = height;
                          }
                      }

                      if (!el.attributes.style)
                          delete el.attributes.style;
                  },

                  blockquote: function( el ){
                    el.addClass('bq-post');
                    el.addClass('bg-container-gray');
                  }
              }
          });
      });
      CKEDITOR.replace('textBody', {
        contentsCss: [CKEDITOR.basePath + 'contents.css', '../../../css/bootstrap.min.css'],
        allowedContent: true,
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
      });
    </script>

    <script>
    $('input#inputTitle').change(function() {
      var str = slugify($(this).val().split(/\s+/).slice(0,12).join(" "));
      $('#rc-2').hide();
      $('#inputSlug').val(str);
    });

    function slugify(str) {
        str = str.replace(/^\s+|\s+$/g, '');
        str = str.toLowerCase();

        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        return str;
    }
    </script>

    <script type="text/javascript">
      var maxLengthRC1 = 150;
      var maxLengthRC2 = 191;
      var maxLengthRC3 = 300;

      $('#inputTitle').on('keyup keydown', function() {
        var length = $(this).val().length;
        var length = maxLengthRC1-length;
        $('#rc-1').text(length);
        if(length < 40){
          $('#rc-1').show();
        } else {
          $('#rc-1').hide();
        }
      });

      $('#inputSlug').on('keyup keydown', function() {
        var length = $(this).val().length;
        var length = maxLengthRC2-length;
        $('#rc-2').text(length);
        if(length < 50){
          $('#rc-2').show();
        } else {
          $('#rc-2').hide();
        }
      });

      $('#inputHeader').on('keyup keydown', function() {
        var length = $(this).val().length;
        var length = maxLengthRC3-length;
        $('#rc-3').text(length);
        if(length < 50){
          $('#rc-3').show();
        } else {
          $('#rc-3').hide();
        }
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
