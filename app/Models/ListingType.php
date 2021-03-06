<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingType extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->hasOne(Listing::class, 'listing_type', 'id');
    }
}
