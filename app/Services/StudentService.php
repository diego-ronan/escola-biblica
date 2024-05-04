<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function getAll()
    {
        $students = Student::all();
        return $students;
    }
}
