<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\User;
use App\Category;
use App\Post;
use App\Tag;
use Analytics;
use Auth;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
  public function index(){

    // ** Google Analytics ** //

    // En caso de que Analytics se esté utilizando:
    // $mostViewedPages = Analytics::fetchMostVisitedPages(Period::days(7), 5);
    // $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));

    // En caso de que NO se use:
    $anyPage = Post::all()->random(5);
    $mostViewedPages = collect([
      ['url' => route('noticia', [str_slug($anyPage[0]->category->name), $anyPage[0]->slug, $anyPage[0]->id]) , 'pageViews' => 250],
      ['url' => route('noticia', [str_slug($anyPage[1]->category->name), $anyPage[1]->slug, $anyPage[1]->id]) , 'pageViews' => 200],
      ['url' => route('noticia', [str_slug($anyPage[2]->category->name), $anyPage[2]->slug, $anyPage[2]->id]) , 'pageViews' => 150],
      ['url' => route('noticia', [str_slug($anyPage[3]->category->name), $anyPage[3]->slug, $anyPage[3]->id]) , 'pageViews' => 100],
      ['url' => route('noticia', [str_slug($anyPage[4]->category->name), $anyPage[4]->slug, $anyPage[4]->id]) , 'pageViews' => 50]
    ]);

    $analyticsData = collect([
      ['date' => '01/01', 'visitors' => 13, 'pageViews' => 16],
      ['date' => '02/01', 'visitors' => 21, 'pageViews' => 29],
      ['date' => '03/01', 'visitors' => 6, 'pageViews' => 6],
      ['date' => '04/01', 'visitors' => 10, 'pageViews' => 12],
      ['date' => '05/01', 'visitors' => 29, 'pageViews' => 42],
      ['date' => '06/01', 'visitors' => 34, 'pageViews' => 48],
      ['date' => '07/01', 'visitors' => 15, 'pageViews' => 36]
    ]);
    $this->data['dates'] = $analyticsData->pluck('date');
    $this->data['visitors'] = $analyticsData->pluck('visitors');
    $this->data['pageViews'] = $analyticsData->pluck('pageViews');

    //Sugerencias
    if(Auth::user()->role->name == "Periodista"){
      $noHeaderPost = Post::where('user_id', '=', Auth::user()->id)->where('header', '=', null)->orderBy('id', 'desc')->get()->take(3);
      $noTagsPost = Post::where('user_id', '=', Auth::user()->id)->withCount('tags')->has('tags', '=', 0)->orderBy('id', 'desc')->get()->take(3);
    } else {
      $noHeaderPost = Post::where('header', '=', null)->orderBy('id', 'desc')->get()->take(3);
      $noTagsPost = Post::withCount('tags')->has('tags', '=', 0)->orderBy('id', 'desc')->get()->take(3);
    }

    if(Auth::user()->role->name == "Periodista"){
      $noDescriptionUser = User::where('id', '=', Auth::user()->id)->where('description', '=', null)->get();
      $noAvatarUser = User::where('id', '=', Auth::user()->id)->where('avatar', '=', null)->get();
    } else {
      $noDescriptionUser = User::withCount('posts')->has('posts', '>', 0)->where('description', '=', null)->orderBy('posts_count', 'desc')->get()->take(3);
      $noAvatarUser = User::withCount('posts')->has('posts', '>', 0)->where('avatar', '=', null)->orderBy('posts_count', 'desc')->get()->take(3);
    }

    $suggestions = [$noHeaderPost, $noTagsPost, $noDescriptionUser, $noAvatarUser];

    //Estadísticas
    $topUser = User::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->first();
    $topCategory = Category::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->first();
    $topTags = Tag::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(3);

    $statistics = [$topUser, $topCategory, $topTags];

    return view('admin.overview', compact('mostViewedPages', 'suggestions', 'statistics'), $this->data);
  }

  public function analytics(){
    if(Auth::user()->role->name == "Periodista"){
      request()->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);
    }

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
    if(Auth::user()->role->name == "Periodista"){
      request()->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);
    }

    $noHeaderPost = Post::where('header', '=', null)->orderBy('id', 'desc')->get();
    $noTagsPost = Post::withCount('tags')->has('tags', '=', 0)->orderBy('id', 'desc')->get();
    $noDescriptionUser = User::withCount('posts')->has('posts', '>', 0)->where('description', '=', null)->orderBy('posts_count', 'desc')->get();
    $noAvatarUser = User::withCount('posts')->has('posts', '>', 0)->where('avatar', '=', null)->orderBy('posts_count', 'desc')->get();

    $suggestions = [$noHeaderPost, $noTagsPost, $noDescriptionUser, $noAvatarUser];

    return view('admin.suggestions', compact('suggestions'));
  }

  public function statistics(){
    if(Auth::user()->role->name == "Periodista"){
      request()->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);
    }

    $topUsers = User::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(5);
    $topCategory = Category::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(10);
    $topTags = Tag::withCount('posts')->whereHas('posts', function($query){ $query->where('created_at', '>=', \Carbon\Carbon::now()->subMonth());})->orderBy('posts_count', 'desc')->get()->take(10);

    $statistics = [$topUsers, $topCategory, $topTags];

    return view('admin.statistics', compact('statistics'));
  }
}
