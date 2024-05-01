<?php

namespace App\Livewire;

use App\Models\Classroom;
use Livewire\Component;

class ClassroomCreate extends Component
{
    public $name;

    public function save()
    {
        Classroom::create([
            'name' => $this->name,
        ]);

        return $this->redirect(route('classroom.list'), navigate: true);
    }

    public function render()
    {
        return view('livewire.classroom-create');
    }
}
