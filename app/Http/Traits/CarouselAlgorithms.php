<?php

namespace App\Http\Traits;

use App\Post;

trait CarouselAlgorithms
{
    public function randomDefault(){
      //Como primer argumento se toman los 30 ultimos post, de los cuales 5 son seleccionados aleatoriamente para desplegarse en el carousel.
      $array_carousel = Post::orderBy('id','desc')->get()->take(30);
      foreach($array_carousel as $key => $data){
        if($key > 0){
          $posts[] = $data;
        }
      }
      if(!empty($posts)){
        shuffle($posts);
        foreach (array_slice($posts,0,5) as $post) {
          $carousel[] = $post;
        }
      } else {
        $carousel = [];
      }

      return $carousel;
    }
}
