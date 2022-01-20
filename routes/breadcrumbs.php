<?php

use App\Models\User;
use App\Models\Listing;
use App\Models\Partner;
use App\Models\Employee;
use App\Models\Testimonial;
use Tabuna\Breadcrumbs\Trail;
use Tabuna\Breadcrumbs\Breadcrumbs;

// Dashboard
Breadcrumbs::for('admin.dashboard', function (Trail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Employees
Breadcrumbs::for('admin.employees.index', function (Trail $trail) {
    $trail->parent('admin.dashboard')
        ->push('Employees', route('admin.employees.index'));
});

Breadcrumbs::for('admin.employees.create', function (Trail $trail) {
    $trail->parent('admin.employees.index')
        ->push('Add Employee', route('admin.employees.create'));
});

Breadcrumbs::for('admin.employees.edit', function (Trail $trail, Employee $employee) {
    $trail->parent('admin.employees.index')
        ->push('Edit ' . $employee->first_name . ' ' . $employee->last_name, route('admin.employees.edit', array($employee)));
});

Breadcrumbs::for('admin.employees.show', function (Trail $trail, Employee $employee) {
    $trail->parent('admin.employees.index')
        ->push($employee->first_name . ' ' . $employee->last_name, route('admin.employees.show', array($employee)));
});

// Testimonials
Breadcrumbs::for('admin.testimonials.index', function (Trail $trail) {
    $trail->parent('admin.dashboard')
        ->push('Testimonials', route('admin.testimonials.index'));
});

Breadcrumbs::for('admin.testimonials.create', function (Trail $trail) {
    $trail->parent('admin.testimonials.index')
        ->push('Add Testimonial', route('admin.testimonials.create'));
});

Breadcrumbs::for('admin.testimonials.edit', function (Trail $trail, Testimonial $testimonial) {
    $trail->parent('admin.testimonials.index')
        ->push('Edit', route('admin.testimonials.edit', array($testimonial)));
});

Breadcrumbs::for('admin.testimonials.show', function (Trail $trail, Testimonial $testimonial) {
    $trail->parent('admin.testimonials.index')
        ->push('Show', route('admin.testimonials.show', array($testimonial)));
});

// Listings
Breadcrumbs::for('admin.listings.index', function (Trail $trail) {
    $trail->parent('admin.dashboard')
        ->push('Listings', route('admin.listings.index'));
});

Breadcrumbs::for('admin.listings.create', function (Trail $trail) {
    $trail->parent('admin.listings.index')
        ->push('Add Listing', route('admin.listings.create'));
});

Breadcrumbs::for('admin.listings.edit', function (Trail $trail, Listing $listing) {
    $trail->parent('admin.listings.index')
        ->push('Edit ' . $listing->address, route('admin.listings.edit', array($listing)));
});

Breadcrumbs::for('admin.listings.show', function (Trail $trail, Listing $listing) {
    $trail->parent('admin.listings.index')
        ->push('Show ' . $listing->address, route('admin.listings.show', array($listing)));
});

// Partners
Breadcrumbs::for('admin.partners.index', function (Trail $trail) {
    $trail->parent('admin.dashboard')
        ->push('Partners', route('admin.partners.index'));
});

Breadcrumbs::for('admin.partners.create', function (Trail $trail) {
    $trail->parent('admin.partners.index')
        ->push('Add Partner', route('admin.partners.create'));
});

Breadcrumbs::for('admin.partners.edit', function (Trail $trail, Partner $partner) {
    $trail->parent('admin.partners.index')
        ->push('Edit ' . $partner->business_name, route('admin.partners.edit', array($partner)));
});

Breadcrumbs::for('admin.partners.show', function (Trail $trail, Partner $partner) {
    $trail->parent('admin.partners.index')
        ->push('Show', route('admin.partners.show', array($partner)));
});

// Users
Breadcrumbs::for('admin.users.index', function (Trail $trail) {
    $trail->parent('admin.dashboard')
        ->push('Users', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (Trail $trail) {
    $trail->parent('admin.users.index')
        ->push('Add User', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function (Trail $trail, User $user) {
    $trail->parent('admin.users.index')
        ->push('Edit ' . $user->name, route('admin.users.edit', array($user)));
});

Breadcrumbs::for('admin.users.show', function (Trail $trail, User $user) {
    $trail->parent('admin.users.index')
        ->push('Show ' . $user->name, route('admin.users.show', array($user)));
});
