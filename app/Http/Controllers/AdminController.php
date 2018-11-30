<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Category;
use App\Post;
use App\Tag;
use Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
  public function index(){

    //Analytics
    $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
    $this->data['dates'] = $analyticsData->pluck('date');
    $this->data['visitors'] = $analyticsData->pluck('visitors');
    $this->data['pageViews'] = $analyticsData->pluck('pageViews');

    $mostViewedPages = Analytics::fetchMostVisitedPages(Period::days(7), 5);
    //Sugerencias
    $noHeaderPost = Post::where('header', '=', null)->get()->take(3);
    $noTagsPost = Post::withCount('tags')->has('tags', '=', 0)->get()->take(3);
    $noDescriptionUser = User::has('posts', '>', 0)->where('description', '=', null)->get()->take(3);
    $noAvatarUser = User::has('posts', '>', 0)->where('avatar', '=', null)->get()->take(3);

    $suggestions = [$noHeaderPost, $noTagsPost, $noDescriptionUser, $noAvatarUser];

    //Estadísticas
    $topUser = User::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->first();
    $topCategory = Category::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->first();
    $topTags = Tag::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(3);

    $statistics = [$topUser, $topCategory, $topTags];

    return view('admin.overview', compact('mostViewedPages', 'suggestions', 'statistics'), $this->data);
  }

  public function analytics(){

    return view('admin.analytics');
  }


  public function suggestions(){

    return view('admin.suggestions');
  }

  public function statistics(){


    return view('admin.statistics');
  }
}
