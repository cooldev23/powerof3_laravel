<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    use HasFactory;

    public function partner()
    {
        return $this->hasOne(Partner::class, 'partner_type', 'id');
    }
}
