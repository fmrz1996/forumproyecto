@forelse ($posts as $post)
<article>
  <div class="row align-middle">
    <div class="col-sm-12 col-md-6">
      <figure class="opacity">
        <a href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}">
          <img class="img-fluid img-post" src="../img/{{ $post->background }}">
        </a>
      </figure>
    </div>
    <div class="col-sm-12 col-md-6">
      <div class="etiqueta-post">
        <aside class="categoria-post">
          <i class="far fa-file-alt"></i>
          <a href="../{{ str_slug($post->category->name) }}">{{ $post->category->name }}</a>
        </aside>
        <aside class="date-post">
          <i class="far fa-calendar-alt"></i>
          {{ $post->created_at->format('d-m-Y') }}
        </aside>
      </div>
      <header class="header-post">
        <h3>
          <a class="titulo-post" href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}">
            @if(!$post->tags->isEmpty())
              <span class="keyword-post">#{{ mb_strtolower($post->tags->pluck('name')->random()) }}</span>
            @endif
            {{ $post->title }}
          </a>
        </h3>
      </header>
      <div class="contenido-post">
        {{ $post->header == null ? strip_tags(html_entity_decode(str_limit($post->body, 250, '...'))) : $post->header }}
        <footer class="links-post">
          <a class="btn azm-outpost azm-size-36 azm-r-square azm-comment" href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}#comentarios"><i class="far fa-comment"></i></a>
          <aside class="btn links-post-loop azm-outpost azm-size-36 azm-r-square azm-share">
            <i class="fas fa-share-square"></i>
              <a class="btn azm-size-36 m-0 azm-social azm-share-social azm-facebook share-link" href="https://www.facebook.com/sharer/sharer.php?u={{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}&amp;src=sdkpreparse"><i class="fab fa-facebook"></i></a>
              <a id="a" class="btn azm-size-36 m-0 azm-social azm-share-social azm-twitter share-link" href="https://twitter.com/share?ref_src=twsrc%5Etf&url={{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}&text={{ $post->title }}&via=revistaforum"><i class="fab fa-twitter"></i></a>
          </aside>
        </footer>
      </div>
    </div>
  </div>
</article>
@empty
@endforelse
