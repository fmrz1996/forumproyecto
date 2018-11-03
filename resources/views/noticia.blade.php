  @extends('layout')

  @section('header')
    <meta property="og:image" content="http://forumcomunicaciones.cl/img/{{ $post->background }}"/>
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->header != null ? $post->header : strip_tags(html_entity_decode(str_limit($post->body, 300, '...'))) }}" />
  @endsection

  @section('title', "$post->title")

  @section('content')
  <!-- Cuerpo de Página -->
    <div id="main">
          <article class="article-container">
            <div class="article-header">
              <div class="article-bg" style="background-image: url('../../img/{{ $post->background }}')"></div>
              <div class="article-entry-header container-fluid">
                    <div class="article-label">
                      <aside class="article-category">
                        <i class="far fa-file-alt"></i>
                        <a href="{{ route('categoria', str_slug($post->category->name)) }}">{{ $post->category->name }}</a>
                      </aside>
                      <aside class="article-date">
                        <i class="far fa-calendar-alt"></i>
                        {{ $post->created_at->format('d-m-Y') }}
                      </aside>
                    </div>
                    <h1 class="article-title">{{ $post->title }}</h1>
                    <aside class="article-author">por {{ $post->user->first_name }} {{ $post->user->last_name }}</aside>
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
                                    {{-- Compartir en Facebook --}}
                                    <div class="fb-share-button" data-href="{{ Request::url() }}" data-mobile-iframe="false">
                                      <a class="share-link btn azm-social azm-inpost azm-size-48 azm-circle azm-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}&amp;src=sdkpreparse">
                                        <i class="fab fa-facebook"></i>
                                      </a>
                                    </div>
                                  </li>
                                  <li>
                                    <a class="share-link btn azm-social azm-inpost azm-size-48 azm-circle azm-twitter" target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etf&text={{ $post->title }}&via=revistaforum"><i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                  </li>
                                  <li>
                                    <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-envelope" href="#"><i class="fas fa-envelope"></i></a>
                                  </li>
                                  <li>
                                    <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-comment" href="#comentarios"><i class="fas fa-comment"></i></a>
                                  </li>
                                </ul>
                              </nav>
                            </div>
                          </div>
                        </div>
                        {{-- Cuerpo de Post --}}
                        <div class="article-text col-lg-11">
                          @if($post->header != null)
                            <div class="article-text-header bg-container-gray">
                              <blockquote>{{ $post->header }}</blockquote>
                            </div>
                            <hr>
                          @endif
                          {!! $post->body !!}

                         {{-- Comentarios Facebook --}}
                         <div id="fb-box">
                           <a id="comentarios" class="fb-box-reveal bg-container-gray" href="#commentsCollapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="commentsCollapse">
                             <h3>Comentarios<i class="far fa-comment"></i></h3>
                             <div class="fb-btn-toggle">
                               <i class="fas fa-angle-down fb-arrow text-center"></i>
                             </div>
                           </a>
                           <div id="commentsCollapse" class="collapse">
                             <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="3" data-colorscheme="light"></div>
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
                                <img src="../../img/{{ $post->user->avatar != null ? $post->user->avatar : 'avatar_placeholder.jpg' }}" class="author-avatar">
                                <h5>{{ $post->user->first_name }} {{ $post->user->last_name }}</h5>
                                <p class="author-description">{{ $post->user->description == null ? 'No cuenta con descripción disponible.' : $post->user->description }}</p>
                              </div>
                            </div>
                          </div>
                            <div class="sb-div">
                              <div class="article-tags">
                                <h3>Tags</h3>
                                @foreach ($post->tags as $tag)
                                  <a class="mb-1" href="{{ route('tag', str_slug($tag->name)) }}">{{ $tag->name }}</a>
                                @endforeach
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
                                            <img class="img-rp img-fluid" src="../../img/saludable.jpg">
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
                                            <img class="img-rp img-fluid" src="../../img/plaza-armas.jpg">
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
            $("#header-fixed").hide();
            var headerSlide = document.getElementById("header-fixed");
            var topItem = $(".article-container").offset().top + 400;

            $(window).scroll(function() {
                if($(window).scrollTop() > topItem) {
                    $("#header-fixed").show();
                    headerSlide.classList.add("slide");
                } else {
                  headerSlide.classList.remove("slide");
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
          $('a[href*=\\#comentarios]').on('click', function(event){
              event.preventDefault();
              $('html,body').animate({scrollTop:$(this.hash).offset().top - 80}, 700);
          });
        </script>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <script>
      $(document).ready(function() {
          $('.share-link').click(function(e) {
              e.preventDefault();
              window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
              return false;
          });
      });
      </script>
      @endsection
