<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $guarded = [];

    public function type()
    {
        return $this->hasOne(EmployeeType::class, 'id', 'employee_type_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'id', 'employee_id');
    }

    public function listings()
    {
        return $this->hasMany(Listing::class, 'id', 'employee_id');
    }

    public function scopeBrokersOnly($query)
    {
        return $query->whereIn('employee_type_id', [1]);
    }

    /**
     * Get the employee's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
