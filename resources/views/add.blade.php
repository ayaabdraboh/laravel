@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center">Welcome to Add page</h1>

        <form action="/add" class="add" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" placeholder="username" name="username" class="form-control offset-4 col-sm-4">
            <input type="email" placeholder="Email" name="email" class="form-control offset-4 col-sm-4">
            <input type="text" placeholder="Firstname" name="fName" class="form-control offset-4 col-sm-4">
            <input type="text" placeholder="lastname" name="lName" class="form-control offset-4 col-sm-4">
            <input type="text" placeholder="Jobtitle" name="jobtitle" class="form-control offset-4 col-sm-4">
            <input type="password" placeholder="password" name="password" class="form-control offset-4 col-sm-4">
            <input type="file" class=" offset-4 col-sm-4" name="photo">
            <input type="text" class="form-control offset-4 col-sm-4" placeholder="location" name="location">
            <select name="status" class="form-control offset-4 col-sm-4" id="">
                <option value="1">Active</option>
                <option value="0">DisActive</option>
            </select>
            <input type="submit" class="btn btn-success offset-4" value="Add">

        </form>

    </div>
@endsection