<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentUpdate extends Component
{
    public Student $student;
    public $name;

    public function mount()
    {
        $this->fill($this->student->only(
            ['name']
        ));
    }

    public function update()
    {
        $this->student->update([
            'name' => $this->name
        ]);

        return $this->redirect(route('student.list'), navigate: true);
    }
    public function render()
    {
        return view('livewire.student-update');
    }
}
