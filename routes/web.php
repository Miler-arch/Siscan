<?php

use App\Http\Controllers\CrossingController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\JealousyController;
use App\Http\Controllers\LittersController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\VeterinaryCareRequestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

// N + 1 problem
// DB::listen(function ($query) {
//     dump($query->sql);
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::resource('dogs', DogController::class)->names('dogs');
Route::get('history_dog/{dog}', [DogController::class, 'history'])->name('history_dog');

Route::resource('jealousies', JealousyController::class)->names('jealousies');

Route::resource('crossings', CrossingController::class)->names('crossings');

Route::resource('litters', LittersController::class)->names('litters');

Route::resource('attentions', VeterinaryCareRequestController::class)->names('attentions');

Route::resource('medical_histories', MedicalHistoryController::class)->names('medical_histories');

Route::get('attentions.pdf', [VeterinaryCareRequestController::class, 'pdf'])->name('attentions.pdf');

});


