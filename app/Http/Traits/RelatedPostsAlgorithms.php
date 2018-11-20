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
          })->pluck('id')->toArray();
          foreach($posts as $id_post){
            $array_post[] = $id_post;
          }
        }

        $array_post = array_diff($array_post, array($post->id));
        $array_rp = Post::whereIn('id', $array_post)->get();

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

        $excluidedposts = $array_post;
        $relatedposts = [$relatedposts, $excluidedposts];

        return $relatedposts;
    }

    public function sameAuthor($post, $rp_remaining, $excluidedposts){

        $array_rp = Post::where('user_id', '=', $post->user_id)
                        ->where('id', '!=', $post->id)
                        ->whereNotIn('id', $excluidedposts)
                        ->get();

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

        $relatedposts = [$relatedposts, $excluidedposts];

        return $relatedposts;
    }

    public function randomDefault($post, $rp_remaining, $excluidedposts){

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

        $relatedposts = [$relatedposts, $excluidedposts];

        return $relatedposts;
    }

    public function firstCategory($post, $excluidedposts){

        $array_rc = Post::where('category_id', '=', $post->category_id)
                        ->where('id', '!=', $post->id)
                        ->whereNotIn('id', $excluidedposts)
                        ->orderBy('id', 'desc')
                        ->get()->take(4);

        foreach($array_rc as $data){
          $posts[] = $data;
        }

        if(!empty($posts)){
          shuffle($posts);
          foreach (array_slice($posts,0,1) as $post) {
            $firstcategory[] = $post;
          }
        } else {
          $firstcategory = [];
        }

        if(!empty($firstcategory)){
          foreach($firstcategory as $post){
            $excluidedposts[] = $post->id;
          }
        } else {
          $excluidedposts;
        }

        $firstcategory = [$firstcategory, $excluidedposts];

        return $firstcategory;
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
