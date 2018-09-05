@extends('layouts.master')

@section('content')
    <div class="col-sm-9">
      <div id="msg" class="alert alert-success">
         
      </div>
      <h2>Add Students</h2>
        <!-- form -->
	    <input type="hidden" value="{{ csrf_token() }}" id="_token">
	    <div class="form-group">
	      <label for="fullname">Full Name</label>
	      <input type="text" class="form-control form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" id="fullname">
	      @if ($errors->has('fullname'))
	          <span class="invalid-feedback" role="alert">
	              <strong>{{ $errors->first('fullname') }}</strong>
	          </span>
	      @endif
	    </div>
	    <div class="form-group">
	        <label for="level_id">Select Level</label>
	        <select id="level_id" class="form-control{{ $errors->has('level_id') ? ' is-invalid' : '' }}" value="{{ old('level_id') }}">
	          <option value=''>Select</option>
	          @if($students)
	            @foreach($students->all() as $student)
	              <option value='{{ $student->id }}'>{{ $student->level }}</option>
	            @endforeach
	          @endif
	        </select>
	        @if ($errors->has('level_id'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('level_id') }}</strong>
	            </span>
	        @endif 
	    </div>
	    <div class="form-group">
	      <label for="admission">Admission Number:</label>
	      <input type="text" class="form-control form-control{{ $errors->has('admission') ? ' is-invalid' : '' }}" id="admission">
	      @if ($errors->has('admission'))
	          <span class="invalid-feedback" role="alert">
	              <strong>{{ $errors->first('admission') }}</strong>
	          </span>
	      @endif
	    </div>
	    <button class="btn btn-primary" id="add_student">Add</button>
	    <!-- end form -->
    </div>
@endsection