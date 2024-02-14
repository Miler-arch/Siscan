<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClinicalRecordController;
use App\Http\Controllers\EuthanasiaController;
use App\Http\Controllers\PaymentCommitmentController;
use App\Http\Controllers\ServiceProvisionContractController;
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

Route::resource('clients', ClientController::class)->names('clients');

Route::resource('animals', AnimalController::class)->names('animals');
Route::get('animals_pdf', [AnimalController::class, 'pdf'])->name('animals_pdf');

Route::resource('clinical_records', ClinicalRecordController::class)->names('clinical_records');
Route::get('clinical_records_pdf/{clinical_records}', [ClinicalRecordController::class, 'pdf'])->name('clinical_records_pdf');

Route::resource('payment_commitments', PaymentCommitmentController::class)->names('payment_commitments');
Route::get('payment_commitments_client/{payment_commitment}', [PaymentCommitmentController::class, 'pdf'])->name('payment_commitments_client');

Route::resource('service_provision_contracts', ServiceProvisionContractController::class)->names('service_provision_contracts');
Route::get('service_provision_contracts/{service_provision_contract}', [ServiceProvisionContractController::class, 'pdf'])->name('service_provision_contracts');

Route::resource('euthanasias', EuthanasiaController::class)->names('euthanasias');
Route::get('euthanasias/{euthanasia}', [EuthanasiaController::class, 'pdf'])->name('euthanasias');

});


