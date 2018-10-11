  @extends('layout')

  @section('content')
  <!-- Cuerpo de Página -->
    <div id="main">
          <article class="article-container">
            <div class="article-header">
              <div class="article-bg" style="background-image: url('../img/valle-itata.jpg')"></div>
              <div class="article-entry-header container-fluid">
                    <div class="article-label">
                      <aside class="article-category">
                        <i class="far fa-file-alt"></i>
                        <a href="#">Actualidad</a>
                      </aside>
                      <aside class="article-date">
                        <i class="far fa-calendar-alt"></i>
                        12 Julio 2018
                      </aside>
                    </div>
                    <h1 class="article-title">Las 4 nuevas rutas turísticas Valle del Itata</h1>
                    <aside class="article-author">por Sergio Romero</aside>
              </div>
            </div>
            <div class="container">
              <div class="article-body">
                <div class="row">
                  <div class="col-sm-12 col-md-9">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-1 d-none d-lg-block">
                          <div class="wrap-azm-cp">
                            <div id="azm-container" class="azm-container-post">
                              <nav>
                                <ul>
                                  <li>
                                    <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-facebook" href="#"><i class="fab fa-facebook"></i></a>
                                  </li>
                                  <li>
                                    <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-twitter" href="#"><i class="fab fa-twitter"></i></a>
                                  </li>
                                  <li>
                                    <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-envelope" href="#"><i class="fas fa-envelope"></i></a>
                                  </li>
                                  <li>
                                    <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-comment" href="#commentsLine"><i class="fas fa-comment"></i></a>
                                  </li>
                                </ul>
                              </nav>
                            </div>
                          </div>
                        </div>
                        <div class="article-text col-lg-11">
                          <p>“Viñas y Observación de aves”, “Aventura campo y mar”, “Alma del Valle” y “Ruta Agroecológica patrimonial” son los nombres de las nuevas rutas disponibles para los turistas en el Valle del Itata con alto valor identitario y patrimonial.</p>
                          <p>“El desafío fue realizar rutas turísticas comercializables en la zona considerando la oferta de las nueve comunas que integran el Valle. Para esto, lo primero que realizamos fue un diagnostico desde nuestra mirada comercial integrando visitas en terreno, estudios, valorización. Gracias a este trabajo hoy las rutas están tarificadas, dirigidas a un tipo específico de segmento y ahora disponibles para la venta”, señala Alejandra Arias, gerente comercial Esquerré Tour Operador quien entregó los resultados del proyecto a los empresarios de la zona en el marco de una licitación de la Dirección Regional de Turismo del Biobío y el programa Zona de Oportunidades.</p>
                          <p>Jonathan Spoerer, director (s) de Sernatur Biobío destacó que uno de los objetivos principales de este proyecto es generar lazos, fortalecer el encadenamiento productivo y potenciar la oferta turística del Valle del Itata de una forma.</p>
                          <p>“Preparar y evaluar los servicios para paquetizarlos y dejarlos disponibles en el mercado es un beneficio que claramente fortalecerá la zona en el ámbito turístico”, afirma.</p>
                          <p>Desde la mirada de los empresarios turísticos de la zona, Carlos Huerta, propietario del complejo turístico “Las Dos Antonias” en Ninhue y Director de la Mesa Público Privada del Valle del Itata comenta que este trabajo es clave para convertirlos realmente en un destino y para comercializar de manera asociativa.
                             “Que una empresa tour operadora nos articule para posteriormente socializar estas rutas es una oportunidad para tener clientes y funcionar como destino de manera profesional”, sostiene.</p>
                         <p>Actualmente estas rutas están disponibles en la empresa Esquerré Tour Operador.</p>

                         {{-- Comentarios Facebook --}}
                         <div id="fb-box">
                           <a id="commentsLine" class="fb-box-reveal bg-container-gray" href="#commentsCollapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="commentsCollapse">
                             <h3>Comentarios<i class="far fa-comment"></i></h3>
                             <div class="fb-btn-toggle">
                               <i class="fas fa-angle-down fb-arrow text-center"></i>
                             </div>
                           </a>
                           <div id="commentsCollapse" class="collapse">
                             <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="3" data-colorscheme="light"></div>
                           </div>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Sidebar -->
                        <div id="sidebar" class="col-sm-12 col-md-3 sidebar">
                          <div class="sb-div">
                            <div class="sb-author">
                              <div class="author-information bg-container-gray">
                                <img src="../img/sergio.jpg" class="author-avatar">
                                <h5>Sergio Romero</h5>
                                <p class="author-description">Periodista y locutor de radio Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                              </div>
                            </div>
                          </div>
                            <div class="sb-div">
                              <div class="article-tags">
                                <h3>Tags</h3>
                                <a class="mb-1" href="#">ñuble</a>
                                <a class="mb-1" href="#">viña</a>
                                <a class="mb-1" href="#">turismo</a>
                                <a class="mb-1" href="#">naturaleza</a>
                              </div>
                            </div>
                            <div class="sb-div">
                              <div class="related-posts">
                                <h3>Artículos relacionados</h3>
                                  <article class="container-rp">
                                        <h5>
                                          <a href="#">
                                            <span class="keyword-post">#comida</span>
                                            Tecnología para hacer alimentos más saludables
                                          </a>
                                        </h5>
                                        <figure class="opacity">
                                          <a href="#">
                                            <img class="img-rp img-fluid" src="../img/saludable.jpg">
                                          </a>
                                        </figure>
                                  </article>
                                  <article class="container-rp">
                                        <h5>
                                          <a href="#">
                                            <span class="keyword-post">#ñuble</span>
                                            La Región de Ñuble en cuenta regresiva
                                          </a>
                                        </h5>
                                        <figure class="opacity">
                                          <a href="#">
                                            <img class="img-rp img-fluid" src="../img/plaza-armas.jpg">
                                          </a>
                                        </figure>
                                  </article>
                              </div>
                            </div>
                        </div>
                </div>
              </div>
            </div>
          </article>
        </div>
      @endsection

      @section('script')
        <script type="text/javascript">
        var azmContainer = document.getElementById("azm-container");
        var offset = $("#azm-container").offset().top - 80;

        $(window).scroll(function() {
            if($(window).scrollTop() > offset) {
                azmContainer.classList.add("azm-fixed");
            } else {
                azmContainer.classList.remove("azm-fixed");
            }
        });
        </script>



        <script type="text/javascript">
          $(document).scroll(function() {
            var $self = $(".azm-container-post");
            $self.css('margin-top', 0);
            var fixedDivOffset = $self.offset().top + $self.outerHeight(true);
            if (fixedDivOffset > ($("#fb-box").offset().top)) {
              $self.css('margin-top', -(fixedDivOffset - $("#fb-box").offset().top));
            } else {
              $self.css('margin-top', '0px');
            }
          });
        </script>

        <script type="text/javascript">
          $('a[href*=\\#commentsLine]').on('click', function(event){
              event.preventDefault();
              $('html,body').animate({scrollTop:$(this.hash).offset().top - 10}, 700);
          });
        </script>
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
      @endsection
