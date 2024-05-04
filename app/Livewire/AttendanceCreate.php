<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Student;
use App\Services\AttendanceService;
use App\Services\StudentService;
use Livewire\Component;

class AttendanceCreate extends Component
{
    public $date;
    public array $student_name;
    public array $attendance_status;
    public array $classroom_id;

    public function save(AttendanceService $attendance)
    {
        foreach ($this->student_name as $key => $name) {
            
            $status = isset($this->attendance_status[$key]) ? $this->attendance_status[$key] : 0;

            $attendance->makeAttendance($this->date, $name, $status, $this->classroom_id[$key]);
            
            // Attendance::create([
            //     'date' => date('Y-m-d', strtotime($this->date)),
            //     'student_name' => $name,
            //     'attendance_status' => $status,
            //     'classroom_id' => $this->classroom_id[$key]
            // ]);
        }
    }

    public function render(StudentService $students)
    {
        $students = $students->getAll();
        
        // Se $attendance_status estiver vazio, inicialize todos os valores como "0" (Ausente)
        if (empty($this->attendance_status)) {
            $this->attendance_status = array_fill(0, count($students), '0');
        }
        
        return view('livewire.attendance-create', [
            'students' => $students
        ]);
    }
}
