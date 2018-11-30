<?php

namespace App\Http\Controllers;

use App\Http\Traits\RelatedPostsAlgorithms;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class NoticiaController extends Controller
{
    use RelatedPostsAlgorithms;

    public function index($category, $slug, $id)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      foreach ($categorias as $cat) {
        $cat_info = Category::where('name', '=', $category)->firstOrFail();
      }
      $post = Post::where('category_id', '=', $cat_info->id)
                  ->where('id', '=', $id)
                  ->firstOrFail();

      if($slug != $post->slug)
      {
        return redirect()->route('noticia', ['category' => str_slug($post->category->name), 'slug' => $post->slug, 'id' => $post->id]);
      }

      //Artículos relacionados
      if($post->tags()->count() > 0){
        $relatedposts = $this->sameTag($post);
        $rp_remaining = 3 - count($relatedposts[0]);
        $excluidedposts = $relatedposts[1];
      } else {
         $excluidedposts = [];
         $relatedposts[0] = [];
         $rp_remaining = 3;
      }

        if($rp_remaining > 0){
          $rp_merge = $relatedposts[0];
          $relatedposts = $this->sameAuthor($post, $rp_remaining, $excluidedposts);
          $excluidedposts = $relatedposts[1];
        } else {
          $relatedposts = $relatedposts[0];
        }

        if(isset($rp_merge)){
          $relatedposts = array_merge($rp_merge, $relatedposts[0]);
          $rp_remaining = 3 - count($relatedposts);
          if($rp_remaining > 0){
            $rp_merge = $relatedposts;
            $relatedposts = $this->randomDefault($post, $rp_remaining, $excluidedposts);
            $excluidedposts = $relatedposts[1];
            $relatedposts = array_merge($rp_merge, $relatedposts[0]);
          }
        }
      //Más sobre categoría
      $firstcategory = $this->firstCategory($post, $excluidedposts);
      $excluidedposts = $firstcategory[1];
      $firstcategory = $firstcategory[0];
      $relatedcategory = $this->categoryDefault($post, $excluidedposts);

      return view('noticia', compact('post', 'categorias', 'relatedposts', 'firstcategory', 'relatedcategory'));
    }


}
