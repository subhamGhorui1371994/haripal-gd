<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'welcome_title',
        'welcome_content',
        'about_us_title',
        'about_us_content',
        'about_trust_title',
        'about_trust_content',
        'president_desk_title',
        'president_desk_content',
        'secretary_desk_title',
        'secretary_desk_content',
    ];

    protected $primaryKey = 'id';
    protected $table = 'home_pages';

    public function __construct()
    {

    }
}
