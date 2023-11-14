<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterSubject extends Model
{
    use HasFactory;

    protected $table = 'semesters_subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'semester_id',
        'subject_id'
    ];

    public function semester(){
        return $this->hasOne(\App\Models\Semester::class, 'id', 'semester_id');
    }

    public function subject(){
        return $this->hasOne(\App\Models\Subject::class, 'id', 'subject_id');
    }
}
