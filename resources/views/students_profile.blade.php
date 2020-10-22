
@extends('layouts.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            {{--
            <div class="title m-b-md">
                Student List in Laravel
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">SID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Class</th>
                    </tr>
                </thead>
                <tbody class="tbody-light">

                @foreach ($students as $key => $student)
                    <tr>
                    <th scope="row">{{$student['id']}}</th>
                    <td>{{$student['name']}}</td>
                    <td>{{$student['age']}}</td>
                    <td>{{$student['class']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            --}}

            <div id="list"></div>

            <p></p>

        </div>


    </div>





@endsection
