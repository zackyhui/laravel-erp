
@extends('layouts.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Student List
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Class</th>
                    </tr>
                </thead>
                <tbody class="tbody-light">
                @foreach ($students as $key => $student)
                    <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$student['name']}}</td>
                    <td>{{$student['age']}}</td>
                    <td>{{$student['class']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p></p>

        </div>


    </div>





@endsection
