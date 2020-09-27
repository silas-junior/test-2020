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

Route::prefix('cursos')->group(function () {
    Route::get('' , 'CourseAreaController@index')->name('course.index');
    Route::post('cadastro' , 'CourseAreaController@store')->name('course.store');
    Route::get('{course}' , 'CourseAreaController@show')->name('course.show');
    Route::put('{course}' , 'CourseAreaController@update')->name('course.update');
    Route::delete('{course}' , 'CourseAreaController@destroy')->name('course.delete');
});

Route::prefix('alunos')->group(function () {
    Route::get('' , 'StudentsController@index')->name('student.index');
    Route::post('cadastro' , 'StudentsController@store')->name('student.store');
    Route::get('{studentId}' , 'StudentsController@show')->name('student.show');
    Route::put('{studentId}' , 'StudentsController@update')->name('student.update');
    Route::delete('{studentId}' , 'StudentsController@destroy')->name('student.delete');
});
