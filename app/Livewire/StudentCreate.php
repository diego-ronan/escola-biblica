<?php

namespace App\Livewire;

use App\Models\Classroom;
use App\Models\Student;
use Livewire\Component;

class StudentCreate extends Component
{
    public $name;
    public $classroom_id;

    public function save()
    {
        Student::create([
            'name' => $this->name,
            'classroom_id' => $this->classroom_id
        ]);

        return $this->redirect(route('student.list'), navigate: true);
    }

    public function render()
    {
        $classrooms = Classroom::all();
        return view('livewire.student-create', [
            'classrooms' => $classrooms
        ]);
    }
}
