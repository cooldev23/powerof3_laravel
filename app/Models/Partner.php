<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    public $guarded = [];

    public function type()
    {
        return $this->hasOne(PartnerType::class, 'id', 'partner_type');
    }
}
