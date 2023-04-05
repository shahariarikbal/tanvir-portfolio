<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PriceingController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ServiceController;

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

//Route::get('/', function () {
//    return view('frontend.home.index');
//});

//Config cache clear
Route::get('clear', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('optimize');
    dd("All clear!");
});

Route::get('/', [\App\Http\Controllers\Frontend\BaseController::class, 'index']);
Route::post('/contact/store', [\App\Http\Controllers\Frontend\BaseController::class, 'contact']);
Route::get('/download', [\App\Http\Controllers\Frontend\BaseController::class, 'download']);
Route::get('/blog/details/{blog}', [App\Http\Controllers\Frontend\BaseController::class, 'showBlogDetails']);
Route::get('/team/details/{team}', [App\Http\Controllers\Frontend\BaseController::class, 'showTeamDetails']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);
Route::delete('/contact/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('contact.destroy');

Route::resource('/settings', SettingController::class);
Route::resource('/abouts', AboutController::class);
Route::resource('/resumes', ResumeController::class);
Route::resource('/experiences', ExperienceController::class);
Route::resource('/portfolios', PortfolioController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/blogs', BlogController::class);
Route::resource('/priceings', PriceingController::class);
Route::resource('/teams', TeamController::class);

Route::get('client/list', [ClientController::class, 'index']);
Route::get('client/create', [ClientController::class, 'create']);
Route::post('client/store', [ClientController::class, 'store']);
Route::get('client/edit/{client}', [ClientController::class, 'edit']);
Route::post('client/update/{client}', [ClientController::class, 'update']);
Route::post('client/destroy/{client}', [ClientController::class, 'destroy']);

Route::get('slider/list', [\App\Http\Controllers\SliderController::class, 'index']);
Route::get('slider/add', [\App\Http\Controllers\SliderController::class, 'create']);
Route::post('slider/store', [\App\Http\Controllers\SliderController::class, 'store']);
Route::get('slider/edit/{slider}', [\App\Http\Controllers\SliderController::class, 'edit']);
Route::post('slider/update/{slider}', [\App\Http\Controllers\SliderController::class, 'update']);
Route::post('slider/destroy/{slider}', [\App\Http\Controllers\SliderController::class, 'destroy']);
