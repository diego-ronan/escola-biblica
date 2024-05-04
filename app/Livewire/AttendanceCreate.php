<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Student;
use Livewire\Component;

class AttendanceCreate extends Component
{
    public $date;
    public $student_name = [];
    public $attendance_status = [];
    public $classroom_id = [];

    public function save()
    {
        foreach ($this->student_name as $key => $name) {
            
            $status = isset($this->attendance_status[$key]) ? $this->attendance_status[$key] : 0;
            
            Attendance::create([
                'date' => date('Y-m-d', strtotime($this->date)),
                'student_name' => $name,
                'attendance_status' => $status,
                'classroom_id' => $this->classroom_id[$key]
            ]);
        }
    }

    public function render()
    {
        $students = Student::all();
        
        // Se $attendance_status estiver vazio, inicialize todos os valores como "0" (Ausente)
        if (empty($this->attendance_status)) {
            $this->attendance_status = array_fill(0, count($students), '0');
        }
        
        return view('livewire.attendance-create', [
            'students' => $students
        ]);
    }
}
