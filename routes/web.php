<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\FrontController;

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

Route::get('/',[FrontController::class,'index'])->name('home');
Route::get('/service-details/{id}',[ServiceController::class,'serviceDetails'])->name('service-details');
Route::get('/blog-details/{id}',[BlogController::class,'blogDetails'])->name('blog-details');
Route::get('/carousel-details/{id}',[CarouselController::class,'carouselDetails'])->name('carousel-details');
Route::get('/category-all/{id}',[FrontController::class,'categoryAll'])->name('category-all');
Route::get('/service-all',[FrontController::class,'serviceAll'])->name('service-all');
Route::get('/blog-all',[FrontController::class,'blogAll'])->name('blog-all');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home.home');
    })->name('dashboard');
});
Route::group(['middleware'=>['auth:sanctum','verified']],function (){
   Route::get('/add-category',[CategoryController::class,'addCategory']) ->name('add-category');
   Route::post('/new-category',[CategoryController::class,'newCategory']) ->name('new-category');
   Route::get('/manage-category',[CategoryController::class,'manageCategory']) ->name('manage-category');
   Route::get('/manage-category',[CategoryController::class,'manageCategory']) ->name('manage-category');
   Route::post('/update-category/{id}',[CategoryController::class,'updateCategory']) ->name('update-category');
   Route::get('/edit-category/{id}',[CategoryController::class,'editCategory']) ->name('edit-category');
   Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory']) ->name('delete-category');
   Route::get('/change-category-status/{id}',[CategoryController::class,'changeCategoryStatus']) ->name('change-category-status');

   Route::get('/add-blog',[BlogController::class,'addBlog'])->name('add-blog');
   Route::post('/new-blog',[BlogController::class,'newBlog'])->name('new-blog');
   Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage-blog');
   Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit-blog');
   Route::post('/update-blog/{id}',[BlogController::class,'updateBlog'])->name('update-blog');
   Route::get('/delete-blog/{id}',[BlogController::class,'deleteBlog'])->name('delete-blog');
   Route::get('/change-blog-status/{id}',[BlogController::class,'changeBlogStatus'])->name('change-blog-status');


   Route::get('/add-service',[ServiceController::class,'addService'])->name('add-service');
   Route::post('/new-service',[ServiceController::class,'newService'])->name('new-service');
   Route::get('/manage-service',[ServiceController::class,'manageService'])->name('manage-service');
   Route::get('/edit-service/{id}',[ServiceController::class,'editService'])->name('edit-service');
   Route::post('/update-service/{id}',[ServiceController::class,'updateService'])->name('update-service');
   Route::get('/delete-service/{id}',[ServiceController::class,'deleteService'])->name('delete-service');
   Route::get('/change-service-status/{id}',[ServiceController::class,'changeServiceStatus'])->name('change-service-status');


   Route::get('/add-carousel',[CarouselController::class,'addCarousel'])->name('add-carousel');
   Route::post('/new-carousel',[CarouselController::class,'newCarousel'])->name('new-carousel');
   Route::get('/manage-carousel',[CarouselController::class,'manageCarousel'])->name('manage-carousel');
   Route::get('/edit-carousel/{id}',[CarouselController::class,'editCarousel'])->name('edit-carousel');
   Route::post('/update-carousel/{id}',[CarouselController::class,'updateCarousel'])->name('update-carousel');
   Route::get('/delete-carousel/{id}',[CarouselController::class,'deleteCarousel'])->name('delete-carousel');
   Route::get('/change-carousel-status/{id}',[CarouselController::class,'changeCarouselStatus'])->name('change-carousel-status');
});
