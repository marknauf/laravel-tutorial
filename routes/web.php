<?php

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

use App\School;
use Illuminate\Http\Request;

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('naufel');
});

Route::get('/getSchools', function (Request $request) {
    $schoolName = $request->input('name');
    $school = App\School::where('name', $schoolName)
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();
    return $school;
});

Route::get('/newSchool', function (Request $request) {
    $school = new School;

    $school->name = $request->name;
    $school->number_of_students = $request->number;

    $school->save();
});
