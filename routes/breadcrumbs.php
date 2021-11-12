<?php

use App\Models\Employee;
use App\Models\Testimonial;
use Tabuna\Breadcrumbs\Trail;
use Tabuna\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('admin.dashboard', function (Trail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

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
