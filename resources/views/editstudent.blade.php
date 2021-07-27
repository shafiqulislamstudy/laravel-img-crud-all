@extends('master')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          Update Student <a href="{{route('student.show')}}" style="float: right;" class="btn btn-primary btn-small">View Student</a>
        </div>
        <div class="card-body">
          <form action="{{route('student.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="studentName" class="form-label">Student name</label>
              <input type="hidden" name="id" value="{{$collection->id}}">
              <input type="text" class="form-control" name="name" value="{{$collection->name}}" id="studentName">
            </div>
            <div class="mb-3">
              <label for="studentImg" class="form-label">Profile image</label>
              <input type="file" class="form-control" name="file" id="studentImg" onchange="preview()">
              <input type="hidden" name="oldImg" value="{{$collection->profileimage}}">
              <img src="{{asset('images')}}/{{$collection->profileimage}}" id="previewImg" alt="Preview" style="max-width: 130px;" class="mt-3"><br>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection