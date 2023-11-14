<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'registration',
        'birth_date',
        'course_id'
    ];

    public function course(){
        return $this->hasOne(\App\Models\Course::class, 'id', 'course_id');
    }
}
