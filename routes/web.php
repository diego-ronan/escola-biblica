<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AttendanceCreate;
use App\Livewire\ClassroomCreate;
use App\Livewire\ClassroomList;
use App\Livewire\ClassroomUpdate;
use App\Livewire\StudentCreate;
use App\Livewire\StudentList;
use App\Livewire\StudentUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/classrooms', ClassroomList::class)->name('classroom.list');
Route::get('/classrooms/create', ClassroomCreate::class)->name('classroom.create');
Route::get('/classrooms/{classroom}/update', ClassroomUpdate::class)->name('classroom.update');
Route::get('/classrooms/{classroom}/delete', ClassroomList::class)->name('classroom.delete');

Route::get('/students', StudentList::class)->name('student.list');
Route::get('/students/create', StudentCreate::class)->name('student.create');
Route::get('/students/{student}/update', StudentUpdate::class)->name('student.update');

Route::get('/attendances/create', AttendanceCreate::class)->name('attendance.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
