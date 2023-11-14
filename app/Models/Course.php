<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'modality',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'modality' => \App\Enums\EnumCourseModality::class,
    ];

    public function semester(){
        return $this->hasOne(\App\Models\Semester::class, 'id', 'semester_id');
    }

    public function subject(){
        return $this->hasOne(\App\Models\Subject::class, 'id', 'subject_id');
    }
}
