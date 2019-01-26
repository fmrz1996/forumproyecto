<?php

namespace App\Http\Traits;

use App\Post;

trait RelatedPostsAlgorithms
{

    public function sameTag($post){

      foreach($post->tags as $tag){
        $ids_tag[] = $tag->id;
      }

      foreach($ids_tag as $tag){
        $posts = Post::whereHas('tags', function($query) use ($tag){
          $query->where('tag_id', $tag);
        })->where('id', '!=', $post->id)->orderBy('id', 'desc')->pluck('id')->toArray();
        foreach($posts as $id_post){
          $array_post[] = $id_post;
        }
      }

      if(!empty($array_post)){
        $fp_value = max($array_post);
        $first_post = Post::where('id', $fp_value)->get();
        foreach($first_post as $data){
          $fp = $data;
        }

        $firsttag[] = $fp;
        $array_posts = array_diff($array_post, array($fp_value));
        $array_rp = Post::whereIn('id', $array_posts)->get();

        foreach($array_rp as $data){
          $posts[] = $data;
        }

        $posts = array_filter($posts, 'is_object');
        if(!empty($posts)){
          shuffle($posts);
          foreach (array_slice($posts,0,3) as $post) {
            $relatedposts[] = $post;
          }
        } else {
          $relatedposts = [];
        }

        $excluidedposts[] = $fp_value;
        if(!empty($relatedposts)){
          foreach($relatedposts as $post){
            $excluidedposts[] = $post->id;
          }
        } else {
          $excluidedposts;
        }
      } else {
        $firsttag = [];
        $relatedposts = [];
        $excluidedposts = [];
      }

      $relatedposts = [$firsttag, $relatedposts, $excluidedposts];

      return $relatedposts;
    }

    public function sameAuthor($post, $rp_remaining, $excluidedposts, $fp_exists){

        $array_rp = Post::where('user_id', '=', $post->user_id)
                        ->where('id', '!=', $post->id)
                        ->whereNotIn('id', $excluidedposts)
                        ->get();

        if(!$array_rp->isEmpty()){
          foreach($array_rp as $data){
            $posts[] = $data;
          }

          if(!empty($posts)){
            shuffle($posts);
            foreach (array_slice($posts,0,$rp_remaining) as $post) {
              $relatedposts[] = $post;
            }
          } else {
            $relatedposts = [];
          }

          if(!empty($relatedposts)){
            foreach($relatedposts as $post){
              $excluidedposts[] = $post->id;
            }
          } else {
            $excluidedposts;
          }
          if($fp_exists === false){
            $firsttag[] = $relatedposts['0'];
            $relatedposts = array_diff($relatedposts, $firsttag);
          } else {
            $firsttag = [];
          }
        } else {
          $relatedposts = [];
          $firsttag = [];
        }

        $relatedposts = [$firsttag, $relatedposts, $excluidedposts];

        return $relatedposts;
    }

    public function randomDefault($post, $rp_remaining, $excluidedposts, $fp_exists){

        $array_rp = Post::orderBy('id', 'desc')
                        ->where('id', '!=', $post->id)
                        ->whereNotIn('id', $excluidedposts)
                        ->get()->take(8);

        foreach($array_rp as $data){
          $posts[] = $data;
        }

        if(!empty($posts)){
          shuffle($posts);
          foreach (array_slice($posts,0,$rp_remaining) as $post) {
            $relatedposts[] = $post;
          }
        } else {
          $relatedposts = [];
        }

        if(!empty($relatedposts)){
          foreach($relatedposts as $post){
            $excluidedposts[] = $post->id;
          }
        } else {
          $excluidedposts;
        }
        if(!empty($relatedposts)){
          if($fp_exists == false){
            $firsttag[] = $relatedposts['0'];
            $relatedposts = array_diff($relatedposts, $firsttag);
          } else {
            $firsttag = [];
          }
        } else {
          $firsttag = [];
        }

        $relatedposts = [$firsttag, $relatedposts, $excluidedposts];

        return $relatedposts;
    }

    public function categoryDefault($post, $excluidedposts){

      //Como primer argumento se toman los 8 ultimos post de la categoría, de los cuales 3 son seleccionados aleatoriamente para desplegarse.
      $array_rp = Post::where('category_id', '=', $post->category_id)
                      ->where('id', '!=', $post->id)
                      ->whereNotIn('id', $excluidedposts)
                      ->inRandomOrder()
                      ->get()->take(8);
      foreach($array_rp as $data){
        $posts[] = $data;
      }

      if(!empty($posts)){
        foreach (array_slice($posts,0,3) as $post) {
          $relatedcategory[] = $post;
        }
      } else {
        $relatedcategory = [];
      }

      return $relatedcategory;
    }
}
