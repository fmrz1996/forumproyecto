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
          <a href="/admin/columnas">Columnas</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
      </ol>

      @include('admin.common.errors')

    <div class="card card-register mx-auto mt-5 mb-5">
      <div class="card-header">
        Editar columna
      </div>
      <div class="card-body">
        <form id="form" action="{{ url("admin/columnas/detalles/{$column->id}") }}" method="post" enctype="multipart/form-data">
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
                <input name="title" type="text" id="inputTitle" class="form-control" placeholder="Escribe un título..." value="{{ old('title', $column->title) }}" required="required" maxlength="150">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group pr-2">
                    <label for="inputColumnist">Columnista</label>
                    <select class="form-control select2-single" name="columnist_id" id="selectColumnist">
                      @foreach ($columnists as $columnist)
                      <option value="{{ $columnist->id }}" {{ old('columnist_id') == $columnist->id ? 'selected=selected' : '' }}> {{ $columnist->name }}</option>
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
                    <input name="slug" type="text" id="inputSlug" class="form-control" placeholder="URL" value="{{ old('slug', $column->slug) }}" required="required" minlegth="5" maxlength="191">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="textBody">Contenido</label>
              <textarea id="textBody" name="body" class="form-control" placeholder="Escribe un texto...">{{ old('body', $column->body) }}</textarea>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Editar columna</button>
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
      $('.select2-single').select2({
        language: "es",
        placeholder: "Seleccione un columnista..."
      });
    </script>

    <script type="text/javascript">
      CKEDITOR.config.removePlugins = 'blockquote,format,horizontalrule,removeformat,link,htmlwriter,image,justify,pastecode,sourcearea,style,youtube';
      CKEDITOR.replace('textBody', {
        contentsCss: [CKEDITOR.basePath + 'contents.css', '../../../css/bootstrap.min.css'],
        allowedContent: true,
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
