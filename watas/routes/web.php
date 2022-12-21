<?php

use TCG\Voyager\Voyager;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use TCG\Voyager\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// $uris = Page::select('slug')->get();
$uris = MenuItem::select('url')->where('menu_id', 2)->where('url', '!=', '/')->where('url', '!=', '')->where('url', '!=', '/posts')->where('url', '!=', '/infografis')->where('url', '!=', '/data-penduduk')->where('url', '!=', '/sarana-keagamaan')->where('url', '!=', '/sarana-pendidikan')->where('url', '!=', '/sarana-kesehatan')->get();

// ->where('url', '!=', '/sarana-keagamaan')->where('url', '!=', '/sarana-pendidikan')->where('url', '!=', '/sarana kesehatan')

Route::get('/', [HomeController::class, 'index']);

Route::get('/dump', function () {

    $uris = MenuItem::select('url')->where('menu_id', 2)->where('url', '!=', '/')->where('url', '!=', '')->where('url', '!=', '/posts')->get();
    dd($uris);
    return view('navMenu', [
        'data' => menu('menu', '_json')
    ]);
});

Route::get('/data-penduduk', [HomeController::class, 'datas']);
Route::get('/charts', [HomeController::class, 'charts']);
Route::get('/sarana-keagamaan', [HomeController::class, 'worships']);
Route::get('/sarana-pendidikan', [HomeController::class, 'schools']);
Route::get('/sarana-kesehatan', [HomeController::class, 'healthcares']);

Route::get('/infografis', [HomeController::class, 'infografis']);
Route::get('/infografis/show/{id:id}', [HomeController::class, 'showInfografis']);

Route::get('/posts', [HomeController::class, 'posts']);
Route::get('/posts/show/{id:id}', [HomeController::class, 'showPost']);

foreach ($uris as $uri) {
    Route::get($uri->url, [HomeController::class, 'profile']);
}


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
