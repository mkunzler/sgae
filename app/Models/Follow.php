<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'adaptation_attempts',
        'semester_id',
        'student_id',
        'subject_id',
        'teacher_id',
    ];

    public function semester(){
        return $this->hasOne(\App\Models\Semester::class, 'id', 'semester_id');
    }

    public function student(){
        return $this->hasOne(\App\Models\Student::class, 'id', 'student_id');
    }

    public function subject(){
        return $this->hasOne(\App\Models\Subject::class, 'id', 'subject_id');
    }

    public function teacher(){
        return $this->hasOne(\App\Models\User::class, 'id', 'teacher_id');
    }
}
