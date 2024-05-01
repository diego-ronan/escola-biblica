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
        $attendanceCount = count($this->attendance_status);

        for ($i = 0; $i < $attendanceCount; $i++) {
            Attendance::create([
                'date' => date('Y-m-d', strtotime($this->date)),
                'student_name' => $this->student_name[$i],
                'attendance_status' => $this->attendance_status[$i],
                'classroom_id' => $this->classroom_id[$i]
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
