<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  .img{
        width: 100%;
        background-image: url({{url('images/background.jpg')}});
        background-size: cover;
        color: #ffffff;
     }
   @media only screen and (max-width: 600px) {
      .img{
        display: none;
      }
   }
   .color{
       color: #000000;
   }
   .footer{
       background:rgba(0,0,0,0.8);
   }
  </style>
</head>
<body>
  <div class="jumbotron text-center img" style="margin-bottom:0">
    <h1>Students Online System</h1>
    <p>Enhancing students lives</p>
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href='{{ url("/") }}'>Student</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href='{{ url("/") }}'>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='{{ url("/student") }}'>Add Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='{{ url("/levels") }}'>Levels</a>
        </li>    
      </ul>
    </div>  
  </nav>

  <div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-3">
      <h4>Important Links</h4>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href='{{ url("/") }}'>All Students</a>
        </li>
        @if($levels)
        @foreach($levels as $level)
        <li class="nav-item">
          <a class="nav-link other_links" href='{{ url("links/{$level->id}") }}'>{{ $level->level }}</a>
        </li>
        @endforeach
        @endif
      </ul>
      <hr class="d-sm-none">
    </div>

  @yield('content')

    </div>
  </div>
  <br>

  <div class="img">
  <div class="jumbotron text-center footer" style="margin-bottom:0">
    <div class="row color">
      <div class="col-sm-4">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total number of students
            <span class="badge badge-primary badge-pill">{{count($students)}}</span>
          </li>
        </ul>
      </div>
      <div class="col-sm-4">
        <h6 style="color: white;">&copy; 2018 Kenalpha Technologies</h6>
      </div>
      <div class="col-sm-4">
    
      </div>
    </div>
  </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  @yield('js')
  <script>
  $(document).ready(function(){
    $('#msg').hide();

    $('#add_student').click(function(){
        $.ajax({
            type: 'post',
            url:  'addStudent',
            data: {
              '_token': $('#_token').val(),
              'fullname': $('#fullname').val(),
              'level_id': $('#level_id').val(),
              'admission': $('#admission').val()
            },
            success: function(data){
              $('#msg').show(); 
              $('#msg').html("Student Added Successfully");
              $('#msg').fadeOut(4000);
              $("input[type=text], textarea").val(""); //reseting input ant text area
            },
        });
    });

    $('#add_level').click(function(){
        $.ajax({
            type: 'post',
            url:  'addLevel',
            data: {
              '_token': $('#_token').val(),
              'level': $('#level').val()
            },
            success: function(data){
              $('#msg').show(); 
              $('#msg').html("Level Added Successfully");
              $('#msg').fadeOut(4000);
              $("input[type=text], textarea").val(""); //reseting input ant text area
            },
        });
    });

    $(document).on("click", '.delete',function(){
        var del_id = $(this).attr('id');
        if (confirm("Do you want to delete this data?")) 
        {
            $.ajax({
                type: "get",
                url: "delete",
                data: {del_id: del_id},
                success: function(data){
                  alert(data);
                  $('#student_table').DataTable().ajax.reload();
                }
            });
        }
        else
        {
            return false;
        }
    });

  });
</script>
</body>
</html>