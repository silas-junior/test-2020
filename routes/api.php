<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseAreaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cursos' , 'CoursesController@index')->name('course.index');
Route::post('/cursos/cadastro' , 'CoursesController@store')->name('course.store');
Route::get('/cursos/{course}' , 'CoursesController@show')->name('course.show');
Route::put('/cursos/{course}' , 'CoursesController@update')->name('course.update');
Route::delete('cursos/{course}' , 'CourseController@delete')->name('course.delete');
