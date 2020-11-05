<?php

use Illuminate\Http\Request;

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

use App\Http\Controllers\API\StudentController;

Route::get('students', [StudentController::class, 'getAllStudents']);
Route::get('students/size/{rpp}', [StudentController::class, 'getAllStudents']);

Route::get('student/sid/{id}', [StudentController::class, 'getStudent']);

Route::post('students', [StudentController::class, 'createStudent']);

Route::put('student/{id}', [StudentController::class, 'updateStudent']);

Route::delete('students/{id}',[StudentController::class, 'deleteStudent']);

