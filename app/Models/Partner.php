<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    public $guarded = [];

    public function type()
    {
        return $this->hasOne(PartnerType::class, 'id', 'partner_type');
    }

    /**
     * Query scope to return lender partners
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeLenders(Builder $query)
    {
        return $query->where('partner_type', 1);
    }

    /**
     * Query scope to return inspector partners
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeInspectors(Builder $query)
    {
        return $query->where('partner_type', 2);
    }

    /**
     * Query scope to return title company partners
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeTitleCompanies(Builder $query)
    {
        return $query->where('partner_type', 3);
    }

    /**
     * Query scope to return miscellaneous partners
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeMisc(Builder $query)
    {
        return $query->where('partner_type', 4);
    }
}
