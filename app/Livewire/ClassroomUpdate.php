<?php

namespace App\Livewire;

use App\Models\Classroom;
use Livewire\Component;

class ClassroomUpdate extends Component
{
    public Classroom $classroom;
    public $name;

    public function mount()
    {
        $this->fill($this->classroom->only(
            ['name']
        ));
    }

    public function update()
    {
        $this->classroom->update([
            'name' => $this->name
        ]);

        return $this->redirect(route('classroom.list'), navigate: true);
    }

    public function render()
    {
        return view('livewire.classroom-update');
    }
}
