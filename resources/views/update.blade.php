@extends('layouts.app')

@section('content')
<div class="container">

    <form  action="/update/{{$employ->user->id}}/{{$employ->id}}" method="post" class="add" style="margin-left: 40%" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" placeholder="userName" value="{{$employ->user->name}}" class="form-control col-sm-5" name="user" required="required">
        <input type="text" placeholder="firstName"     value=" {{$employ->fName}}" class="form-control col-sm-5" required="required" name="firstname">
        <input type="text" placeholder="lastName" value=" {{$employ->lName}}" class="form-control col-sm-5" required="required" name="lastname">
        <input type="email" placeholder="Email" value=" {{$employ->user->email}}" class="form-control col-sm-5" required="required" name="email">
        <input type="password" placeholder="Password" class="form-control col-sm-5" required="required" name="password">
        <input type="text" placeholder="Job Title" value=" {{$employ->jobTitle}}" class="form-control col-sm-5" required="required" name="job">
            Add Image
        <input type="file" name="photo" >

        <input type="text"   value=" {{$employ->lang}}" placeholder="location" class="form-control col-sm-5" name="location">


        <select name="status" class="form-control col-sm-5" >

            @if(isset($employ->status) && $employ->status == 1 )
                <option value="1">Active</option>
                <option value="0">DisActive</option>
            @elseif(isset($employ->status)&& $employ->status == 0)
                <option value="0">DisActive</option>
                <option value="1">Active</option>
            @else
                <option value="1">Active</option>
                <option value="0">DisActive</option>
             @endif

        </select>

        <input type="submit" value="Add" class="btn btn-success">

    </form>


</div>
@endsection
