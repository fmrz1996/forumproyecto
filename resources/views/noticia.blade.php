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
      <div id="post">
          <article class="article-container">
            @if($post->style == 2)
              @include('post.style2')
            @else
              @include('post.style1')
            @endif
            </article>
          </div>
          @if(!empty($firstpost))
          <section class="related-posts p-4 bg-container-gray">
            <div class="container">
              <h3 class="mb-4">Te puede interesar:</h3>
              @foreach ($firstpost as $rp)
                <article class="article-rp-highlight mb-2">
                  <h5>
                    <a href="{{ route('noticia', [str_slug($rp->category->name), $rp->slug, $rp->id]) }}">
                    @if(!$rp->tags->isEmpty())
                      <span class="keyword-post">#{{ mb_strtolower($rp->tags->pluck('name')->random()) }}</span>
                    @endif
                    {{ $rp->title }}
                    </a>
                  </h5>
                  <div class="row">
                    <div class="div-rp-highlight col-sm-12 col-md-7 pr-0">
                      <figure class="opacity m-0">
                        <a href="{{ route('noticia', [str_slug($rp->category->name), $rp->slug, $rp->id]) }}">
                          <img class="img-rp img-fluid" src="../../img/thumb/{{ $rp->background }}">
                        </a>
                      </figure>
                    </div>
                    <div class="div-rp-highlight col-sm-12 col-md-5 pl-0 ">
                      <blockquote class="bq-header-rp">{{ $rp->header == null ? strip_tags(html_entity_decode(str_limit($rp->body, 250, '...'))) : $rp->header }}</blockquote>
                    </div>
                  </div>
                </article>
              @endforeach
                  @if(!empty($relatedposts))
                  <hr>
                  <div class="row rp">
                    @foreach ($relatedposts as $rp)
                      <div class="col-md-4">
                          <article class="article-rp">
                            <h6>
                              <a href="{{ route('noticia', [str_slug($rp->category->name), $rp->slug, $rp->id]) }}">
                              @if(!$rp->tags->isEmpty())
                                <span class="keyword-post">#{{ mb_strtolower($rp->tags->pluck('name')->random()) }}</span>
                              @endif
                              {{ $rp->title }}
                              </a>
                            </h6>
                            <figure class="opacity">
                              <a href="{{ route('noticia', [str_slug($rp->category->name), $rp->slug, $rp->id]) }}">
                                <img class="img-rp img-fluid" src="../../img/thumb/{{ $rp->background }}">
                              </a>
                            </figure>
                          </article>
                      </div>
                    @endforeach
                  </div>
                @endif
                </div>
          </section>
        @endif
        </div>
      @endsection

      @section('script')
        <script type="text/javascript">
          setTimeout(function (){
            var azmContainer = document.getElementById("azm-container");
            var offset = $("#azm-container").offset().top - 80;

            $(window).scroll(function() {
                if($(window).scrollTop() > offset) {
                    azmContainer.classList.add("azm-fixed");
                } else {
                    azmContainer.classList.remove("azm-fixed");
                }
            });
          },100);
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
