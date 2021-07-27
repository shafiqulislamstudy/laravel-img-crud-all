@extends('master')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          Add Student <a href="{{route('student.show')}}" style="float: right;" class="btn btn-primary btn-small">View Student</a>
        </div>
        <div class="card-body">

        @if ($message=Session::get('success'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

          <form action="{{route('student.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="studentName" class="form-label">Student name</label>
              <input type="text" class="form-control" name="name" id="studentName">
              <span style="color: red;">@error('name'){{$message}} @enderror</span>
            </div>
            <div class="mb-3">
              <label for="studentImg" class="form-label">Profile image</label>
              <input type="file" class="form-control" name="file" id="studentImg" onchange="preview()">
              <img src="" id="previewImg" alt="Preview" style="max-width: 130px;" class="mt-3"><br>
              <span style="color: red;">@error('file'){{$message}} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection