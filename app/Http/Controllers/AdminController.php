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
    $noHeaderPost = Post::where('header', '=', null)->orderBy('id', 'desc')->get()->take(3);
    $noTagsPost = Post::withCount('tags')->has('tags', '=', 0)->orderBy('id', 'desc')->get()->take(3);
    $noDescriptionUser = User::withCount('posts')->has('posts', '>', 0)->where('description', '=', null)->orderBy('posts_count', 'desc')->get()->take(3);
    $noAvatarUser = User::withCount('posts')->has('posts', '>', 0)->where('avatar', '=', null)->orderBy('posts_count', 'desc')->get()->take(3);

    $suggestions = [$noHeaderPost, $noTagsPost, $noDescriptionUser, $noAvatarUser];

    //Estadísticas
    $topUser = User::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->first();
    $topCategory = Category::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->first();
    $topTags = Tag::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(3);

    $statistics = [$topUser, $topCategory, $topTags];

    return view('admin.overview', compact('mostViewedPages', 'suggestions', 'statistics'), $this->data);
  }

  public function analytics(){

    $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30));
    $this->data['dates'] = $analyticsData->pluck('date');
    $this->data['visitors'] = $analyticsData->pluck('visitors');
    $this->data['pageViews'] = $analyticsData->pluck('pageViews');

    $topSystems = Analytics::performQuery(Period::days(30), 'ga:sessions', ['dimensions' => 'ga:operatingSystem']);
    foreach ($topSystems['rows'] as $system) {
      $tsNames[] = $system[0];
      $tsValues[] = $system[1];
    }
    $topSystems = array($tsNames, $tsValues);

    $mostViewedPages = Analytics::fetchMostVisitedPages(Period::days(30), 10);
    $topReferrers = Analytics::fetchTopReferrers(Period::days(30), 10);

    return view('admin.analytics', compact('topSystems', 'mostViewedPages', 'topReferrers'), $this->data);
  }

  public function suggestions(){

    $noHeaderPost = Post::where('header', '=', null)->orderBy('id', 'desc')->get();
    $noTagsPost = Post::withCount('tags')->has('tags', '=', 0)->orderBy('id', 'desc')->get();
    $noDescriptionUser = User::withCount('posts')->has('posts', '>', 0)->where('description', '=', null)->orderBy('posts_count', 'desc')->get();
    $noAvatarUser = User::withCount('posts')->has('posts', '>', 0)->where('avatar', '=', null)->orderBy('posts_count', 'desc')->get();

    $suggestions = [$noHeaderPost, $noTagsPost, $noDescriptionUser, $noAvatarUser];

    return view('admin.suggestions', compact('suggestions'));
  }

  public function statistics(){
    $topUsers = User::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(5);
    $topCategory = Category::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(10);
    $topTags = Tag::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(10);

    $statistics = [$topUsers, $topCategory, $topTags];

    return view('admin.statistics', compact('statistics'));
  }
}
