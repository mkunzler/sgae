<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessibilityPlan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'deficiency',
        'chronogram',
        'objective',
        'methodology',
        'instrument',
        'student_id',
        'semester_id',
    ];

    public function student(){
        return $this->hasOne(\App\Models\Student::class, 'id', 'student_id');
    }

    public function semester(){
        return $this->hasOne(\App\Models\Semester::class, 'id', 'semester_id');
    }
}
