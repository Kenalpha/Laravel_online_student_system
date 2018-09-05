@extends('layouts.master')

@section('content')
    <div class="col-sm-9">
      <div id="msg" class="alert alert-success">
         
      </div>
      <h2>Add Levels</h2>
        <!-- form -->
	    <input type="hidden" value="{{ csrf_token() }}" id="_token">
	    <div class="form-group">
	      <label for="level">Enter New Level</label>
	      <input type="text" class="form-control form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" id="level">
	      @if ($errors->has('level'))
	          <span class="invalid-feedback" role="alert">
	              <strong>{{ $errors->first('level') }}</strong>
	          </span>
	      @endif
	    </div>
	    <button class="btn btn-primary" id="add_level">Add</button>
	    <!-- end form -->
	    <br><br><br>
    </div>
@endsection