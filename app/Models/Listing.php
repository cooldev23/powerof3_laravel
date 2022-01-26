<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public $guarded = [];

    public function broker()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function type()
    {
        return $this->hasOne(ListingType::class, 'id', 'listing_type');
    }

    public function media()
    {
        return $this->hasMany(ListingMedia::class);
    }
}
