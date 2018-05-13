@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/add" class="btn btn-success">Add</a>




    <table style="border: 1px solid black " border="1px" width="100px" class="text-center table">
        <tr>
            <td>username</td>
            <td>firstname</td>
            <td>lastname</td>
            <td>job</td>
            <td>mail</td>
            <td>img</td>
            <td>status</td>
        </tr>

        @foreach($employees as $employee)

            <tr>
                <td>{{$employee->user->name}}</td>
                <td>{{$employee->fName}}</td>
                <td>{{$employee->lName}}</td>
                <td>{{$employee->jobTitle}}</td>
                <td>{{$employee->user->email}}</td>
                <td><img src="{{ Storage::url($employee->imge)}}" width="100px" height="100px" /> </td>
                <td>
                    <a href="/update/{{$employee->id}}">update</a>
                    <a href="/delete/{{$employee->user->id}}/{{$employee->id}}">delete</a>
                </td>
            </tr>
        @endforeach

    </table>






</div>
@endsection
