<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'name',
        'mobile_number',
        'email',
        'terms_accepted',
        'outlet_id',
        'bill_number',
        'bill_image'
    ];

    // An entry belongs to an outlet, even if outlet is soft deleted
    public function outlet()
    {
        return $this->belongsTo(Outlet::class)->withTrashed();
    }
}
