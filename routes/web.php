<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ListingMediaController;
use App\Http\Controllers\AdminDashboardController;

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
Route::get('show-listing/{listing}', [FrontEndController::class, 'showListing'])->name('front-end.show-listing');
Route::get('listing-search', [FrontEndController::class, 'listingSearch'])->name('front-end.search-listing');

// Listing Search
Route::get('get-listings', [SearchController::class, 'getListings'])->name('front-end.get-listings');

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

        // Listings
        Route::get('listings', [ListingController::class, 'index'])->name('admin.listings.index');
        Route::get('listings/show/{listing}', [ListingController::class, 'show'])->name('admin.listings.show');
        Route::get('listings/create', [ListingController::class, 'create'])->name('admin.listings.create');
        Route::post('listings/create', [ListingController::class, 'store'])->name('admin.listings.store');
        Route::get('listings/edit/{listing}', [ListingController::class, 'edit'])->name('admin.listings.edit');
        Route::put('listings/edit/{listing}', [ListingController::class, 'update'])->name('admin.listings.update');

        // Listing Media (images, videos)
        // Route::get('listing-media', [ListingMediaController::class, 'index'])->name('admin.listing-media.index');
        Route::get('listing-media/show/{listing}', [ListingMediaController::class, 'show'])->name('admin.listing-media.show');
        Route::get('listing-media/create/{listing}', [ListingMediaController::class, 'create'])->name('admin.listing-media.create');
        Route::post('listing-media/create/{listing}', [ListingMediaController::class, 'store'])->name('admin.listing-media.store');
        // Route::get('listing-media/edit/{listing}', [ListingMediaController::class, 'edit'])->name('admin.listing-media.edit');
        // Route::put('listing-media/edit/{listing}', [ListingMediaController::class, 'update'])->name('admin.listing-media.update');

        // Testimonials
        Route::get('testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
        Route::get('testimonials/show/{testimonial}', [TestimonialController::class, 'show'])->name('admin.testimonials.show');
        Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
        Route::post('testimonials/create', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
        Route::get('testimonials/edit/{testimonial}', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
        Route::put('testimonials/edit/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');

        // Partners
        Route::get('partners', [PartnerController::class, 'index'])->name('admin.partners.index');
        Route::get('partners/show/{partner}', [PartnerController::class, 'show'])->name('admin.partners.show');
        Route::get('partners/create', [PartnerController::class, 'create'])->name('admin.partners.create');
        Route::post('partners/create', [PartnerController::class, 'store'])->name('admin.partners.store');
        Route::get('partners/edit/{partner}', [PartnerController::class, 'edit'])->name('admin.partners.edit');
        Route::put('partners/edit/{partner}', [PartnerController::class, 'update'])->name('admin.partners.update');

        // User
        Route::middleware(['permission:manage users'])->group(function() {
            Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('users/show/{user}', [UserController::class, 'show'])->name('admin.users.show');
            Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('users/create', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::put('users/edit/{user}', [UserController::class, 'update'])->name('admin.users.update');
        });        
    });
});


require __DIR__.'/auth.php';
