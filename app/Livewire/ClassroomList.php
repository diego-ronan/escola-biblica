<?php

namespace App\Livewire;

use App\Models\Classroom;
use Livewire\Component;

class ClassroomList extends Component
{
    public function render()
    {
        $classrooms = new Classroom();
        return view('livewire.classroom-list', [
            'classrooms' => $classrooms->with('students')->get(),
        ]);
    }

    public function delete(Classroom $classroom)
    {
        $classroom->delete();
    }
}
