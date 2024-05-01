<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AttendanceCreate extends Component
{
    public $date;
    public $student_name = [];
    public $attendance_status = [];
    public $classroom_id = [];
    
    public function save()
    {
        foreach ($this->attendance_status as $key => $status) {
            Attendance::create([
                'date' => date('Y-m-d', strtotime($this->date)),
                'student_name' => $this->student_name[$key],
                'attendance_status' => $status,
                'classroom_id' => $this->classroom_id[$key]
            ]);
        }
    }

    public function render()
    {
        $students = Student::all();
        return view('livewire.attendance-create', [
            'students' => $students
        ]);
    }
}
