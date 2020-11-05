<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Controllers\DB;
use App\Http\Resources\Student as StudentResource;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

use Illuminate\Support\Facades\Config;

class StudentController extends Controller
{
    public function getAllStudents($rpp=1) {
        $students = QueryBuilder::for(Student::class)
                    ->allowedFilters([AllowedFilter::exact('id'), 'name'])
                    ->allowedSorts('id', 'name')
                    ->paginate($rpp);

        return StudentResource::collection($students)
                ->response()
                ->setStatusCode(200);

        //return response($students, 200);

    }

    public function getStudent($sid) {
        if (Student::where('id', $sid)->exists()) {
            //$student = Student::where('id', $sid)->get();
            $student = Student::find($sid);
            return (new StudentResource($student));

          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }

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



    public function updateStudent(Request $request, $sid) {

        if (Student::where('id', $sid)->exists()) {
            $student = Student::find($sid);

            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->age = is_null($request->age) ? $student->age : $request->age;
            $student->class = is_null($request->class) ? $student->class : $request->class;
            $student->last_updated_at = now();
            $student->save();


            return response()->json([
                "message" => "records updated successfully",
                "result" =>  ['id' => $sid, 'name' => $student->name, 'age' => $student->age, 'class' => $student->class]
            ], 200);
            } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);

        }


        return response()->json(['成功'], 200);
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
