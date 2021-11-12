<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontEndController::class, 'index'])->name('welcome');
Route::get('listings', [FrontEndController::class, 'listings'])->name('front-end.listings');

Route::prefix('admin')->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Employees
        Route::get('employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
        Route::get('employees/show/{employee}', [EmployeeController::class, 'show'])->name('admin.employees.show');
        Route::get('employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
        Route::post('employees/create', [EmployeeController::class, 'store'])->name('admin.employees.store');
        Route::get('employees/edit/{employee}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
        Route::put('employees/edit/{employee}', [EmployeeController::class, 'update'])->name('admin.employees.update');

        // Testimonials
        Route::get('testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
        Route::get('testimonials/show/{testimonial}', [TestimonialController::class, 'show'])->name('admin.testimonials.show');
        Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
        Route::post('testimonials/create', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
        Route::get('testimonials/edit/{testimonial}', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
        Route::put('testimonials/edit/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    });
});


require __DIR__.'/auth.php';
