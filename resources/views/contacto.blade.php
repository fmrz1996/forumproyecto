
  @extends('layout')

  @section('title', "Contacto - Revista Forum")

  @section('content')
    <!-- Cuerpo de Página -->
    <div id="main" class="container contact-form">
        <h3>Contacto</h3>
          <div class="row">
            <div class="col-sm-12 col-md-6 contact-form-container">
              <form method="post">
              <h5>¿Cómo te podemos ayudar?</h5>
              <div class="form-group">
                <input class="form-control" type="text" name="txtName" placeholder="Nombre" value="">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="txtEmail" placeholder="Correo electrónico" value="">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="txtMessage" rows="8" cols="80" placeholder="Tu mensaje..."></textarea>
              </div>
              <div class="form-group">
                <input class="contact-btn" type="submit" name="btnSubmit" value="Enviar Mensaje">
              </div>
            </form>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="contact-social">
              <div class="social-div">
                <h5>Se parte de la comunidad Forum</h5>
                <div class="sb-rrss">
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-facebook" href="#"><i class="fab fa-facebook"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-twitter" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-instagram" href="#"><i class="fab fa-instagram"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-youtube-play" href="#"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  @endsection
