<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearComplete extends Model
{
    protected $table = 'year_complete';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'passing_year',
        'present_profession',
    ];
}
