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

      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">
          Editar post
        </div>
        <div class="card-body">
          <form id="form" action="{{ url("admin/posts/detalles/{$post->id}") }}" method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
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
                  <input name="title" type="text" id="inputTitle" class="form-control" value="{{ old('title', $post->title) }}" placeholder="Título" required="required" maxlength="150">
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group pr-2">
                    <label for="selectCategory">Categoría</label>
                    <select id="selectCategory" class="form-control" name="category_id">
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
                  <div class="form-label-group pl-2">
                    <div class="form-row">
                      <div class="col-md-10">
                        <label for="inputSlug">URL</label>
                      </div>
                      <div class="col-md-2">
                        <span id="rc-2" class="remaining-char float-right"></span>
                      </div>
                    </div>
                    <input name="slug" type="text" id="inputSlug" class="form-control" placeholder="URL" value="{{ old('slug', $post->slug) }}" required="required" minlegth="5" maxlength="191">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group pr-2">
                    <label for="selectCategory">Estilo</label>
                    <select class="form-control" name="style" id="selectStyle">
                      <option value="1" {{ 1 == $post->style ? 'selected=selected' : '' }}>Clásico</option>
                      <option value="2" {{ 2 == $post->style ? 'selected=selected' : '' }}>Panorámico</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group pl-2">
                    <label for="inputBackground">Imagen de fondo</label>
                    <div class="row">
                      <div class="col-md-10">
                        <input name="background" type="file" id="inputBackground" placeholder="Escribe la URL de la imagen..." value="{{ old('background', $post->background) }}" accept="image/x-png,image/gif,image/jpeg"></input>
                      </div>
                      <div class="col-md-2">
                        <input class="form-check-input" type="checkbox" id="checkLink" onclick="checkLinkFunction()"></input>
                        <label class="form-check-label" for="checkLink">
                          Link
                        </label>
                      </div>
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
                <textarea id="inputHeader" name="header" type="text" class="form-control" placeholder="Encabezado" rows="4" maxlength="300">{{ old('header', $post->header) }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <label for="textBody">Contenido</label>
                <textarea name="body" id="textBody" class="form-control" required="required">{{ old('body', $post->body) }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <label for="selectTags">Tags</label>
                <select class="form-control select2-multi" name="tags[]" id="selectTags" multiple="multiple">
                  @foreach ($tags as $tag)
                    <option value="{{ $tag->name }}"
                      @foreach ($post->tags as $tagofpost)
                          {{ $tagofpost->name == $tag->name ? "selected=selected" : '' }}
                      @endforeach
                      >{{ $tag->name }}</option>
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
        placeholder: "Escribe los tags aquí...",
        maximumInputLength: 30,
        maximumSelectionLength: 15
      });
    </script>

    <script type="text/javascript">
      CKEDITOR.on('instanceReady', function (ev) {
          ev.editor.dataProcessor.htmlFilter.addRules( {
              elements : {
                  img: function( el ){

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
        if(length < 40){
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

    <script>
      function checkLinkFunction() {
        var checkBox = document.getElementById("checkLink");
        var divCheckLink = document.getElementById("inputBackground");

        if (checkBox.checked == true){
          divCheckLink.type = 'text';
          divCheckLink.classList.add('form-control');
        } else {
          divCheckLink.type = 'file';
          divCheckLink.classList.remove('form-control');
        }
      }
    </script>
  @endsection
