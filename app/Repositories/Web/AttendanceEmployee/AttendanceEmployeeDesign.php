<?php

namespace App\Repositories\Web\AttendanceEmployee;

interface AttendanceEmployeeDesign {
    public function check_attendance($nip);
    public function storeChekIn($param);
    public function storeCheckOut($param);
}
