<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CountryController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index')
    ->middleware('permission:users.index');

    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')
     ->middleware('permission:users.edit');

    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')
    ->middleware('permission:users.edit');

    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')
    ->middleware('permission:users.destroy');
    
    // Roles
    Route::resource('roles', RoleController::class);
    
    // Business
    Route::get('business', [CompanyController::class, 'index'])->name('business.index')
    ->middleware('permission:business.index');

    Route::get('business/create', [CompanyController::class, 'create'])->name('business.create')
    ->middleware('permission:business.create');

    Route::post('business', [CompanyController::class, 'store'])->name('business.store')
    ->middleware('permission:business.create');

    Route::get('info', [CompanyController::class, 'edit'])->name('business.edit')
    ->middleware('permission:business.edit');

    Route::put('business/{company_id}', [CompanyController::class, 'update'])->name('business.update')
    ->middleware('permission:business.edit');

    Route::delete('business/{company}', [CompanyController::class, 'destroy'])->name('business.destroy')
    ->middleware('permission:business.destroy');


    // Applicants 
    Route::get('about', [ApplicantController::class, 'edit'])->name('applicants.edit')
    ->middleware('permission:applicants.edit');

    Route::put('applicants/{applicant_id}', [ApplicantController::class, 'update'])->name('applicants.update')
    ->middleware('permission:applicants.edit'); 

    Route::patch('applicants/upload', [ApplicantController::class, 'upload'])->name('applicants.upload')
    ->middleware('permission:applicants.edit');

    Route::patch('applicants/change', [ApplicantController::class, 'change'])->name('applicants.change')
    ->middleware('permission:applicants.edit');

    Route::delete('applicants/destroy', [ApplicantController::class, 'destroy'])->name('applicants.destroy')
    ->middleware('permission:applicants.destroy');

    // Education
    Route::get('education', [EducationController::class, 'index'])->name('education.index')
    ->middleware('permission:education.index');

    Route::get('education/create', [EducationController::class, 'create'])->name('education.create')
    ->middleware('permission:education.create');

    Route::post('education', [EducationController::class, 'store'])->name('education.store')
    ->middleware('permission:education.create');

    Route::get('education/{id}/edit', [EducationController::class, 'edit'])->name('education.edit')
    ->middleware('permission:education.edit');

    Route::put('education/{id}', [EducationController::class, 'update'])->name('education.update')
    ->middleware('permission:education.edit');

    Route::delete('education/{id}', [EducationController::class, 'destroy'])->name('education.destroy')
    ->middleware('permission:education.destroy');

    Route::patch('education/{id}', [EducationController::class, 'delete'])->name('applicants.delete')
    ->middleware('permission:education.destroy');  

    // Trainings
    Route::get('trainings', [TrainingController::class, 'index'])->name('trainings.index')
    ->middleware('permission:trainings.index');

    Route::get('trainings/create', [TrainingController::class, 'create'])->name('trainings.create')
    ->middleware('permission:trainings.create');

    Route::post('trainings', [TrainingController::class, 'store'])->name('trainings.store')
    ->middleware('permission:trainings.create');

    Route::get('trainings/{id}/edit', [TrainingController::class, 'edit'])->name('trainings.edit')
    ->middleware('permission:trainings.edit');

    Route::put('trainings/{id}', [TrainingController::class, 'update'])->name('trainings.update')
    ->middleware('permission:trainings.edit');

    Route::delete('trainings/{id}', [TrainingController::class, 'destroy'])->name('trainings.destroy')
    ->middleware('permission:trainings.destroy');

    Route::patch('trainings/{id}', [TrainingController::class, 'delete'])->name('trainings.delete')
    ->middleware('permission:trainings.destroy');

    // Experiences
    Route::get('experiences', [ExperienceController::class, 'index'])->name('experiences.index')
    ->middleware('permission:experiences.index');

    Route::get('experiences/create', [ExperienceController::class, 'create'])->name('experiences.create')
    ->middleware('permission:experiences.create');

    Route::post('experiences', [ExperienceController::class, 'store'])->name('experiences.store')
    ->middleware('permission:experiences.create');

    Route::get('experiences/{id}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit')
    ->middleware('permission:experiences.edit');

    Route::put('experiences/{id}', [ExperienceController::class, 'update'])->name('experiences.update')
    ->middleware('permission:experiences.edit');

    Route::delete('experiences/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy')
    ->middleware('permission:experiences.destroy');

    Route::patch('experiences/{id}', [ExperienceController::class, 'delete'])->name('experiences.delete')
    ->middleware('permission:experiences.destroy');

    // Announcements
    Route::get('announcements', [AnnouncementController::class, 'index'])->name('announcements.index')
    ->middleware('permission:announcements.index');

    Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create')
    ->middleware('permission:announcements.create');

    Route::post('announcements', [AnnouncementController::class, 'store'])->name('announcements.store')
    ->middleware('permission:announcements.create');

    Route::get('announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit')
    ->middleware('permission:announcements.edit');

    Route::put('announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update')
    ->middleware('permission:announcements.edit');

    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy')
    ->middleware('permission:announcements.destroy');

    Route::patch('announcements/{announcement}', [AnnouncementController::class, 'delete'])->name('announcements.delete')
    ->middleware('permission:announcements.destroy');

    Route::get('announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show')
    ->middleware('permission:announcements.select');

    Route::post('announcements/{announcement}/select', [AnnouncementController::class, 'select'])->name('announcements.select')
    ->middleware('permission:announcements.select');

    Route::post('announcements/{announcement}/apply', [AnnouncementController::class, 'apply'])->name('announcements.apply')
    ->middleware('permission:announcements.apply');

    // Records
    Route::get('curriculum', [RecordController::class, 'index'])->name('records.index')
    ->middleware('permission:records.index');

    Route::get('applications', [RecordController::class, 'see'])->name('records.see')
    ->middleware('permission:records.index');

    Route::get('curriculum/{id}', [RecordController::class, 'show'])->name('records.show')
    ->middleware('permission:records.show');

    // Documents 
    Route::get('documents', [DocumentController::class, 'edit'])->name('documents.edit')
    ->middleware('permission:documents.edit');

    Route::put('documents/update', [DocumentController::class, 'update'])->name('documents.update')
    ->middleware('permission:documents.edit');

    Route::delete('documents/destroy', [DocumentController::class, 'destroy'])->name('documents.destroy')
    ->middleware('permission:documents.destroy');

    // Degrees
    Route::get('degrees', [DegreeController::class, 'index'])->name('degrees.index')
    ->middleware('permission:degrees.index');  

    // Provinces
    Route::get('provinces/{id}', [ProvinceController::class,'show'])->name('provinces.show')
    ->middleware('permission:provinces.show');

    // Departments
    Route::get('departments', [DepartmentController::class, 'index'])->name('departments.index')
    ->middleware('permission:departments.index');

    Route::get('departments/{id}', [DepartmentController::class, 'show'])->name('departments.show')
    ->middleware('permission:departments.show');

    // Countries
    Route::get('countries', [CountryController::class, 'index'])->name('countries.index')
    ->middleware('permission:countries.index');
});