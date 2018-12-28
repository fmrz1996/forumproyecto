
  @extends('layout')

  @section('title', "Contacto - Revista Forum")

  @section('content')
    <!-- Cuerpo de Página -->
    <div id="main" class="container contact-form">
        <h3>Contacto</h3>
          <div class="row">
            <div class="col-sm-12 col-md-6 contact-form-container">
              @if(Session::has('flash_message'))
                  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
              @endif
              <form action="{{ route('email') }}" method="post">
                @csrf
              <h5>¿Cómo te podemos ayudar?</h5>
              <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Nombre" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Correo electrónico" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="8" cols="80" placeholder="Tu mensaje..." required></textarea>
              </div>
              <div class="form-group">
                <input class="contact-btn" type="submit" name="btnSubmit" value="Enviar Mensaje">
              </div>
            </form>
          </div>
          <div class="col-sm-12 col-md-6">
            <h5>Tambien puedes contactarnos por:</h5>
            <ul>
              <li>Email: director@revistaforum.cl</li>
              <li>Dirección: Libertad 683 - Chillán</li>
              <li>Teléfono: 42-2322204 / +56996151234</li>
            </ul>
            <div class="contact-social">
              <div class="social-div">
                <h5>Se parte de la comunidad Forum</h5>
                <div class="sb-rrss">
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-facebook" href="https://www.facebook.com/RevistaForum/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-twitter" href="https://twitter.com/forumchile" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-instagram" href="https://www.instagram.com/revistaforumchile/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-youtube-play" href="#"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  @endsection
