<div class="article-header style-2">
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
        <h1 class="@if(strlen($post->title) >= 120) article-title-extra @elseif(strlen($post->title) >= 90) article-title-long @else article-title @endif">{{ $post->title }}</h1>
        <aside class="article-author">por {{ $post->user->first_name }} {{ $post->user->last_name }}</aside>
  </div>
</div>
<div class="container">
  <div class="article-body">
    <div class="row">
      <div class="col-sm-12 col-md-9">
        <div class="container">
          <div class="row">
            {{-- Interacción social escritorio --}}
            <div class="col-lg-1 d-none d-lg-block">
              <div class="wrap-azm-cp">
                <div id="azm-container" class="azm-container-post">
                  <nav>
                    <ul>
                      <li>
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
                        <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-envelope"
                        href="mailto:?subject=Le%20han%20compartido:%20{{ $post->title }}&body=Estimado%20lector.%0A%0ALe%20han%20compartido%20el%20art%C3%ADculo%20%22{{ $post->title }}%22%20aqu%C3%AD:%0A%0A%20{{ Request::url() }}%0A%0ASaludos%20cordiales%20de%20Forum%20Comunicaciones.">
                        <i class="fas fa-envelope"></i></a>
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
                  <blockquote class="bq-header">{{ $post->header }}</blockquote>
                </div>
                <hr>
              @endif
              {!! $post->body !!}
             {{-- Interacción social móvil --}}
             <div class="d-lg-none">
               <div class="azm-container-post">
                 <nav>
                   <ul class="nav justify-content-center">
                     <li>
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
                       <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-envelope"
                       href="mailto:?subject=Le%20han%20compartido:%20{{ $post->title }}&body=Estimado%20lector.%0A%0ALe%20han%20compartido%20el%20art%C3%ADculo%20%22{{ $post->title }}%22%20aqu%C3%AD:%0A%0A%20{{ Request::url() }}%0A%0ASaludos%20cordiales%20de%20Forum%20Comunicaciones.">
                       <i class="fas fa-envelope"></i></a>
                     </li>
                     <li>
                       <a class="btn azm-social azm-inpost azm-size-48 azm-circle azm-comment" href="#comentarios"><i class="fas fa-comment"></i></a>
                     </li>
                   </ul>
                 </nav>
               </div>
             </div>
             {{-- Comentarios Facebook --}}
             <div class="mt-4" id="fb-box">
               <a id="comentarios" class="fb-box-reveal bg-container-gray active" href="#commentsCollapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="commentsCollapse">
                 <h3>Comentarios<i class="far fa-comment"></i></h3>
                 <div class="fb-btn-toggle">
                   <i class="fas fa-angle-down fb-arrow text-center"></i>
                 </div>
               </a>
               <div id="commentsCollapse" class="collapse bg-container">
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
                    <img src="../../img/users/{{ $post->user->avatar != null ? $post->user->avatar : 'avatar_placeholder.jpg' }}" class="author-avatar">
                    <h5>{{ $post->user->first_name }} {{ $post->user->last_name }}</h5>
                    <p class="author-description">{{ $post->user->description == null ? 'No cuenta con descripción disponible.' : $post->user->description }}</p>
                  </div>
                </div>
              </div>
                <div class="sb-div">
                  <div class="article-tags">
                    <h3>Tags</h3>
                    @forelse ($post->tags as $tag)
                      <a class="mb-1" href="{{ route('tag', str_slug($tag->name)) }}">{{ $tag->name }}</a>
                    @empty
                      No hay tags registrados.
                    @endforelse
                  </div>
                </div>
                @if(!empty($relatedcategory))
                <div class="sb-div">
                  <div class="related-category">
                    <h3>Más de {{ $post->category->name }} </h3>
                    @foreach ($relatedcategory as $rc)
                      <article class="container-rc">
                        <h5>
                          <a href="{{ route('noticia', [str_slug($rc->category->name), $rc->slug, $rc->id]) }}">
                            @if(!$rc->tags->isEmpty())
                              <span class="keyword-post">#{{ mb_strtolower($rc->tags->pluck('name')->random()) }}</span>
                            @endif
                            {{ $rc->title }}
                          </a>
                        </h5>
                        <figure class="opacity">
                          <a href="{{ route('noticia', [str_slug($rc->category->name), $rc->slug, $rc->id]) }}">
                            <img class="img-rc img-fluid" src="../../img/thumb/{{ $rc->background }}">
                          </a>
                        </figure>
                      </article>
                    @endforeach
                  </div>
                </div>
              @endif
            </div>
      </div>
    </div>
  </div>
