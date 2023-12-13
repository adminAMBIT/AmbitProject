<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RepresentantController;
use App\Http\Controllers\SubphaseController;
use App\Http\Controllers\UserTypeController;
use App\Models\Instruction;
use Illuminate\Support\Facades\Route;


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
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // PROJECTS
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('admin');
    Route::post('/projects/create', [ProjectController::class, 'store'])->name('projects.store')->middleware('admin');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit')->middleware('admin');
    Route::post('/projects/{id}/edit', [ProjectController::class, 'update'])->middleware('admin');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy')->middleware('admin');
    Route::get('/projects/{project_id}/documents', [ProjectController::class,'showDocuments'])->name('projects.documents.index')->middleware('admin');

    Route::get('/project/{project_id}/company/{company_id}/manageUsers', [ProjectController::class,'manageUsers'])->name('projects.companies.manageUsers.index')->middleware('admin');
    Route::post('/project/{project_id}/company/{company_id}/manageUsers', [ProjectController::class,'manageUsersStore'])->name('projects.companies.manageUsers.store')->middleware('admin');
    Route::delete('/project/{project_id}/company/{company_id}/manageUsers/{user_id}', [ProjectController::class,'manageUsersDestroy'])->name('projects.companies.manageUsers.destroy')->middleware('admin');


    // COMPANIES
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index')->middleware('admin');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create')->middleware('admin');
    Route::post('/companies/create', [CompanyController::class, 'store'])->name('companies.store')->middleware('admin');
    Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show')->middleware('admin');
    Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit')->middleware('admin');
    Route::post('/companies/{id}/edit', [CompanyController::class, 'update'])->middleware('admin');
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy')->middleware('admin');
    Route::get('/projects/{project_id}/company/{company_id}/documents', [CompanyController::class,'showDocuments'])->name('projects.companies.documents.index');

    // REPRESENTANTS
    Route::get('/companies/{company_id}/create-respresentant', [RepresentantController::class, 'create'])->name('representants.create')->middleware('admin');
    Route::post('/companies/{company_id}/create-respresentant', [RepresentantController::class, 'store'])->name('representants.store')->middleware('admin');
    Route::get('/representants/{id}', [RepresentantController::class, 'show'])->name('representants.show')->middleware('admin');
    Route::get('/representants/{id}/edit', [RepresentantController::class, 'edit'])->name('representants.edit')->middleware('admin');
    Route::post('/representants/{id}/edit', [RepresentantController::class, 'update'])->middleware('admin');
    Route::delete('/representants/{id}', [RepresentantController::class, 'destroy'])->name('representants.destroy')->middleware('admin');

    // USER TYPES
    Route::get('/userTypes/create', [UserTypeController::class, 'create'])->name('userTypes.create')->middleware('admin');
    Route::post('/userTypes/create', [UserTypeController::class, 'store'])->name('userTypes.store')->middleware('admin');
    Route::get('/userTypes/{id}', [UserTypeController::class, 'edit'])->name('userTypes.edit')->middleware('admin');
    Route::post('/userTypes/{id}', [UserTypeController::class, 'update'])->middleware('admin');
    Route::delete('/userTypes/{id}', [UserTypeController::class, 'destroy'])->name('userTypes.destroy')->middleware('admin');

    // CONTACTS
    Route::get('/companies/{company_id}/create-contact', [ContactController::class, 'create'])->name('contacts.create')->middleware('admin');
    Route::post('/companies/{company_id}/create-contact', [ContactController::class, 'store'])->name('contacts.store')->middleware('admin');
    Route::get('/companies/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show')->middleware('admin');
    Route::get('/companies/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit')->middleware('admin');
    Route::post('/companies/contacts/{id}/edit', [ContactController::class, 'update'])->middleware('admin');
    Route::delete('/companies/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy')->middleware('admin');

    // MANAGE COMPANIES
    Route::get('/projects/{project_id}/manage-companies', [ProjectController::class, 'manageCompanies'])->name('projects.manageCompanies.index')->middleware('admin');
    Route::post('/projects/{project_id}/manage-companies', [ProjectController::class, 'manageCompaniesStore'])->name('projects.manageCompanies.store')->middleware('admin');
    Route::delete('/projects/{project_id}/manage-companies/{company_id}', [ProjectController::class, 'manageCompaniesDestroy'])->name('projects.manageCompanies.destroy')->middleware('admin');

    // PHASES
    Route::get('/projects/{project_id}/create-phase', [PhaseController::class, 'create'])->name('projects.phases.create')->middleware('admin');
    Route::post('/projects/{project_id}/create-phase', [PhaseController::class, 'store'])->name('projects.phases.store')->middleware('admin');
    Route::get('/projects/{project_id}/phases/{phase_id}', [PhaseController::class, 'show'])->name('projects.phases.show');
    Route::get('/projects/{project_id}/edit-phase/{phase_id}', [PhaseController::class, 'edit'])->name('projects.phases.edit')->middleware('admin');
    Route::post('/projects/{project_id}/edit-phase/{phase_id}', [PhaseController::class, 'update'])->middleware('admin');
    Route::delete('/projects/{project_id}/delete-phase/{phase_id}', [PhaseController::class, 'destroy'])->name('projects.phases.destroy')->middleware('admin');

    // SUBPHASES
    Route::get('/projects/{project_id}/phases/{phase_id}/create-subphase', [SubphaseController::class, 'create'])->name('projects.phases.subphases.create')->middleware('admin');
    Route::post('/projects/{project_id}/phases/{phase_id}/create-subphase', [SubphaseController::class, 'store'])->name('projects.phases.subphases.store')->middleware('admin');
    Route::get('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}', [SubphaseController::class, 'show'])->name('projects.phases.subphases.show');
    Route::get('/projects/{project_id}/phases/{phase_id}/edit-subphase/{subphase_id}', [SubphaseController::class, 'edit'])->name('projects.phases.subphases.edit')->middleware('admin');
    Route::post('/projects/{project_id}/phases/{phase_id}/edit-subphase/{subphase_id}', [SubphaseController::class, 'update'])->middleware('admin');
    Route::delete('/projects/{project_id}/phases/{phase_id}/delete-subphase/{subphase_id}', [SubphaseController::class, 'destroy'])->name('projects.phases.subphases.destroy')->middleware('admin');
    Route::get('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/companies', [SubphaseController::class,'showDocuments'])->name('projects.phases.subphases.companies.index')->middleware('admin');
    Route::post('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/companies', [SubphaseController::class,'showFilteredDocuments'])->middleware('admin');




    // DOCUMENTS
    Route::get('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/upload-documents', [DocumentController::class, 'create'])->name('projects.phases.subphases.document.create');
    Route::post('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/upload-documents', [DocumentController::class, 'store'])->name('projects.phases.subphases.document.store');
    Route::get('/documents/{document_id}', [DocumentController::class, 'show'])->name('document.show');
    Route::get('/download-document/{document_id}', [DocumentController::class, 'download'])->name('document.download');
    Route::get('/documents/view/{document_id}', [DocumentController::class, 'view'])->name('document.view');
    Route::get('/edit-document/{document_id}', [DocumentController::class, 'edit'])->name('document.edit');
    Route::post('/edit-document/{document_id}', [DocumentController::class, 'update'])->name('document.update');
    Route::delete('/delete-document/{document_id}', [DocumentController::class, 'destroy'])->name('document.destroy');
    Route::get('/project/{project_id}/company/{company_id}/downloadAll', [DocumentController::class,'downloadAll'])->name('projects.companies.documents.downloadAll')->middleware('admin');
    Route::get('/projects/{project_id}/company/{company_id}/downloadForm', [DocumentController::class, 'downloadForm'])->name('projects.companies.documents.downloadForm')->middleware('admin');
    Route::post('/projects/{project_id}/company/{company_id}/downloadForm', [DocumentController::class, 'downloadByStatus'])->middleware('admin');


    // FEEDBACK
    Route::get('/documents/{document_id}/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index')->middleware('admin');
    Route::get('/documents/{document_id}/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create')->middleware('admin');
    Route::post('/documents/{document_id}/feedbacks/create', [FeedbackController::class, 'store'])->name('feedbacks.store')->middleware('admin');
    Route::get('/documents/{document_id}/feedbacks/{feedback_id}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit')->middleware('admin');
    Route::post('/documents/{document_id}/feedbacks/{feedback_id}/edit', [FeedbackController::class, 'update'])->name('feedbacks.update')->middleware('admin');
    Route::delete('/feedbacks/{feedback_id}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy')->middleware('admin');

    // INSTRUCTIONS
    Route::get('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/create-instruction', [InstructionController::class, 'create'])->name('projects.phases.subphases.instruction.create')->middleware('admin');
    Route::post('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/create-instruction', [InstructionController::class, 'store'])->middleware('admin');
    Route::get('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/edit-instruction/{instruction_id}', [InstructionController::class, 'edit'])->name('projects.phases.subphases.instruction.edit')->middleware('admin');
    Route::post('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/edit-instruction/{instruction_id}', [InstructionController::class, 'update'])->middleware('admin');
    Route::delete('/projects/{project_id}/phases/{phase_id}/subphases/{subphase_id}/delete-instruction/{instruction_id}', [InstructionController::class, 'destroy'])->name('projects.phases.subphases.instruction.destroy')->middleware('admin');


});

Route::get('{any}', function () {
    return view('404');
})->where('any', '.*');

