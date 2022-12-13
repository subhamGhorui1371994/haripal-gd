<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'course_type',
        'course_name',
        'duration',
        'exam_type',
        'course',
        'intake_capacity',
        'board',
        'session',
        'syllabus',
        'admission_link',
    ];

    protected $primaryKey = 'id';
    protected $table = 'courses';

    public function __construct()
    {

    }
}
