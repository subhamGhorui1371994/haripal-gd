<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'building',
        'campus',
        'class_rooms',
        'smart_class',
        'laboratories',
        'music',
        'library',
        'canteen',
    ];

    protected $primaryKey = 'id';
    protected $table = 'infrastructures';

    public function __construct()
    {

    }
}
