<?php

use App\Http\Controllers\Admin\DrugController as AdminDrugController;
use App\Http\Controllers\Admin\PrescriptionController as AdminPrescriptionController;
use App\Http\Controllers\Admin\QuotationController as AdminQuotationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/prescription',PrescriptionController::class);
    Route::resource('/quotation',QuotationController::class);
});



Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('drug',AdminDrugController::class);
    Route::resource('prescription',AdminPrescriptionController::class);
    Route::resource('quotation',AdminQuotationController::class);
    Route::post('/send-quotation', [AdminQuotationController::class, 'sendQuotation'])->name('quotation.send');
});


require __DIR__.'/auth.php';
