<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get', 'post'], "/", [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], "/register", [AuthController::class, 'register'])->name('register');


Route::group(['middleware' => ['auth:web']], function () {

    Route::controller(DashBoardController::class)->group(function () {
        Route::get('homePage', 'homePage')->name('homePage');
    });

    Route::controller(CategoriesController::class)->group(function () {
        Route::match(['get', 'post'], 'categoriesList', 'categoriesList')->name('categoriesList');
        Route::post('saveCategory', 'saveCategory')->name('saveCategory');
        Route::post('updateProductCategoryStatus', 'updateProductCategoryStatus')->name('updateProductCategoryStatus');
        Route::post('deleteProductCategory', 'deleteProductCategory')->name('deleteProductCategory');
    });
    

    Route::controller(ProductController::class)->group(function () {
        Route::match(['get', 'post'], 'saveProductDetails', 'saveProductDetails')->name('saveProductDetails');
    });


});
