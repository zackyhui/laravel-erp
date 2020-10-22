<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Controllers\DB;

class StudentController extends Controller
{
    public function index() {
        $response = \App::call('App\Http\Controllers\API\StudentController@getAllStudents');
        $students = $response->getData()->data;
        $students_list = [];
        foreach ($students as $student) {

            $result = (array) $student;
            $students_list[] = $result;
        }

        return view('students_profile', ['students' => $students_list]);
        /*
        $result = json_decode(json_encode($students), true);
        //var_dump($result['data']);exit();
        return view('students_profile', ['students' => $result['data']]);
        */
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
