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

Route::get('/cursos' , 'CourseAreaController@index')->name('course.index');
Route::post('/cursos/cadastro' , 'CourseAreaController@store')->name('course.store');
Route::get('/cursos/{course}' , 'CourseAreaController@show')->name('course.show');
Route::put('/cursos/{course}' , 'CourseAreaController@update')->name('course.update');
Route::delete('cursos/{course}' , 'CourseAreaController@destroy')->name('course.delete');
