<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use SoftDeletes,HasFactory;    

    protected $fillable = [
        'name',
        'location',
        'slug',
        'status',
        'qr_code_path'
    ];

    // An outlet has many entries
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
