<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RepresentantController;
use App\Http\Controllers\ContactTypeController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PROJECTS
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/create', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/{id}/edit', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');


    // COMPANIES
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies/create', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::post('/companies/{id}/edit', [CompanyController::class, 'update']);
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');

    // REPRESENTANTS
    Route::get('/companies/{company_id}/create-respresentant', [RepresentantController::class, 'create'])->name('representants.create');
    Route::post('/companies/{company_id}/create-respresentant', [RepresentantController::class, 'store'])->name('representants.store');
    Route::get('/representants/{id}', [RepresentantController::class, 'show'])->name('representants.show');
    Route::get('/representants/{id}/edit', [RepresentantController::class, 'edit'])->name('representants.edit');
    Route::post('/representants/{id}/edit', [RepresentantController::class, 'update']);
    Route::delete('/representants/{id}', [RepresentantController::class, 'destroy'])->name('representants.destroy');

    // CONTACT TYPES
    Route::get('/contactTypes/create', [ContactTypeController::class, 'create'])->name('contactTypes.create');
    Route::post('/contactTypes/create', [ContactTypeController::class, 'store'])->name('contactTypes.store');
    Route::get('/contactTypes/{id}', [ContactTypeController::class, 'edit'])->name('contactTypes.edit');
    Route::post('/contactTypes/{id}', [ContactTypeController::class, 'update']);
    Route::delete('/contactTypes/{id}', [ContactTypeController::class, 'destroy'])->name('contactTypes.destroy');


});
