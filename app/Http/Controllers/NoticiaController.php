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
        $rp_remaining = 4 - count($relatedposts[0]) - count($relatedposts[1]);
        $firstpost = $relatedposts[0];

        if(empty($firstpost)){
          $fp_exists = false;
        } else {
          $fp_exists = true;
        }

        $excluidedposts = $relatedposts[2];
        $relatedposts = $relatedposts[1];
      } else {
         $excluidedposts = [];
         $relatedposts = [];
         $fp_exists = false;
         $rp_remaining = 4;
      }

        if($rp_remaining > 0){
          $rp_merge = $relatedposts;
          $relatedposts = $this->sameAuthor($post, $rp_remaining, $excluidedposts, $fp_exists);
          $excluidedposts = $relatedposts[2];
        }

        if(isset($rp_merge)){
          if($fp_exists == false){
            $firstpost = $relatedposts[0];
          }
          if(empty($firstpost)){
            $fp_exists = false;
          } else {
            $fp_exists = true;
          }
          $relatedposts = array_merge($rp_merge, $relatedposts[1]);
          $rp_remaining = 4 - count($relatedposts) - count($firstpost);
        if($rp_remaining > 0){
          $rp_merge = $relatedposts;
          $relatedposts = $this->randomDefault($post, $rp_remaining, $excluidedposts, $fp_exists);
          if($fp_exists == false){
            $firstpost = $relatedposts[0];
          }
          $excluidedposts = $relatedposts[2];
          $relatedposts = array_merge($rp_merge, $relatedposts[1]);
        }
      }
      //Más sobre categoría
      $relatedcategory = $this->categoryDefault($post, $excluidedposts);

      return view('noticia', compact('post', 'categorias', 'relatedposts', 'firstpost', 'relatedcategory'));
    }


}
