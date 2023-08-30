<?php


//use App\Http\Controllers\CategoryController;

use App\Http\Controllers\EmployeeController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return Redirect::to('login');
});

Auth::routes();

Route::prefix("dashboard")->middleware("auth")->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get("/profile","ProfileController@edit")->name("profile.edit");
    Route::post("/update","ProfileController@update")->name("profile.update");
    Route::post("/update-photo","ProfileController@updatePhoto")->name("profile.updatePhoto");

    Route::get('employees/export/', "EmployeeController@export")->name("employees.export");
    Route::get("/employees/csvCreate","EmployeeController@csvCreate")->name("employees.csvCreate");
    Route::post("/employees/csvStore","EmployeeController@importEmployee")->name("employees.csvStore");
    Route::get("/employees/search","EmployeeController@search")->name("employees.search");
    Route::resource("/employees", "EmployeeController");

    Route::get("/email",[WelcomeMail::class,"build"]);


});
