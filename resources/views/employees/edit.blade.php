@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="py-5">Update Information</h3>
        <div>
            <form action="/employees/{{$employeeDetails->id}}" method="POST">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" value="{{$employeeDetails->fname}}" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" value="{{$employeeDetails->lname}}" required>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary float-right">
            </form>
        </div>
    </div>
@endsection