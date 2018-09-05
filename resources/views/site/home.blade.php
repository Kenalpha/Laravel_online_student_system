@extends('layouts.master')

@section('content')
    <div class="col-sm-9">
      <h2>Students</h2>
      <div class="table-responsive">
        <table class="table table-hover" id="student_table">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Level</th>
              <th>Admission Number</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if($students)
            @foreach($students as $student)
              <tr>
                <td>{{$student->fullname}}</td>
                <td>{{$student->level_id}}</td>
                <td>{{$student->admission}}</td>
                <td>
                  <button class="btn btn-primary edit" id='{{$student->id}}'>Edit</button>
                  <button class="btn btn-danger delete" id='{{$student->id}}'>Delete</button>
                </td>
              </tr>
            @endforeach
            @else
              <tr>
              <td colspan="3" class="text-center"><strong>No data Found</strong></td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
@endsection

@section('js')

@endsection