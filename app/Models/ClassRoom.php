<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'semester_id',
        'subject_id',
        'teacher_id',
        'situation',
        'workload'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'situation' => \App\Enums\EnumSituation::class,
        'workload' => \App\Enums\EnumWorkload::class,
    ];

    public function student(){
        return $this->hasOne(\App\Models\Student::class, 'id', 'student_id');
    }

    public function semester(){
        return $this->hasOne(\App\Models\Semester::class, 'id', 'semester_id');
    }

    public function subject(){
        return $this->hasOne(\App\Models\Subject::class, 'id', 'subject_id');
    }

    public function teacher(){
        return $this->hasOne(\App\Models\User::class, 'id', 'teacher_id');
    }
}
