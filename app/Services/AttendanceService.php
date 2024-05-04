<?php

namespace App\Services;

use App\Models\Attendance;

class AttendanceService
{
    public function makeAttendance($date, $name, $status, $id)
    {
        Attendance::create([
          'date' => date('Y-m-d', strtotime($date)),
          'student_name' => $name,
          'attendance_status' => $status,
          'classroom_id' => $id
        ]);
    }
}
