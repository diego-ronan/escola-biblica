<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentList extends Component
{
    public function render()
    {
        $students = Student::all();
        return view('livewire.student-list', [
            'students' => $students
        ]);
    }

    public function delete(Student $student)
    {
        $student->delete();
    }
}
