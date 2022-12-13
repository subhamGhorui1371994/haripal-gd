<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'footer_short_info',
        'address',
        'email',
        'phone',
        'facebook_url',
        'twitter_url',
        'instagram_url',
    ];

    protected $primaryKey = 'id';
    protected $table = 'site_settings';

    public function __construct()
    {

    }
}
