<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\DB;

class StudentController extends Controller
{
    public function index() {
        $students = Student::orderBy('age', 'DESC')->get();
        /*
        $students = Student::where('age', '>', 10)
            ->where('name', 'Ada')
            ->get();
        */
        return view('students_profile', ['students' => $students]);
    }

    public function show($sid) {
        return view('students_details', ['sid' => $sid]);
    }

    public function __invoke()
    {
        $sid = 'invoke';
        return view('students_details', ['sid' => $sid]);
    }
}
