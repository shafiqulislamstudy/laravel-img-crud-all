@extends('master')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    All Student <a href="{{route('student.addForm')}}" style="float: right;" class="btn btn-primary btn-small">Add Student</a>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Profile Pic</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->name}}</td>
                                <td><img src="{{asset('images')}}/{{$item->profileimage}}" alt="profile image" style="max-width:90px;"></td>
                                <td>
                                    <a href="editstudent/{{$item->id}}" class="btn btn-primary btn-small">Edit</a>
                                    <a onclick="return confirm('Do you want to delete?')" href="deletestudent/{{$item->id}}" class="btn btn-danger btn-small">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection