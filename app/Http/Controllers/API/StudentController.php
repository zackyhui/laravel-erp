<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Controllers\DB;

class StudentController extends Controller
{
    public function getAllStudents() {
        $students = Student::orderBy('age', 'ASC')->get()->toJson(JSON_PRETTY_PRINT);
        return response($students , 200);
    }

    public function createStudent(Request $request) {
        $student = new Student;
        $student->name = $request->name;
        $student->age = $request->age;
        $student->class = $request->class;
        $student->save();

        return response()->json([
            "message" => "Student record created"
        ], 201);
    }

    public function getStudent($sid) {
        if (Student::where('id', $sid)->exists()) {
            $student = Student::where('id', $sid)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }

    }

    public function updateStudent(Request $request, $sid) {
        if (Student::where('id', $sid)->exists()) {
            $student = Student::find($sid);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->age = is_null($request->age) ? $student->age : $request->age;
            $student->class = is_null($request->class) ? $student->class : $request->class;
            $student->updated_at = now();
            $student->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);

        }
    }

    public function deleteStudent ($sid) {
        if(Student::where('id', $sid)->exists()) {
            $student = Student::find($sid);
            $student->delete();

            return response()->json([
                "message" => "Record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }
}
