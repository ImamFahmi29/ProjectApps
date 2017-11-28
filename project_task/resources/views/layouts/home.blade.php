<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!-- icheck checkboxes -->
    <!-- <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}">
    <link rel="stylesheet" href="https://raw.githubusercontent.com/fronteed/icheck/1.x/skins/square/yellow.css"> -->
    <!-- toastr notifications -->
    <!-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> -->
    <!-- Font Awesome -->
  <!--   <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- <link rel="stylesheet" href="{{ asset('/css/material-design/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/material-design/ripples.min.css') }}"> -->
    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
  
  @include('shared.head_nav')
  <main role="main" class="container">
    <div class="jarak"></div>
        <div class="row">
            <div class="col-sm-12 blog-main">
                <div class="blog-post">
                      @if (Session::has('error'))
                      <div class="session-flash alert-danger">
                         {{Session::get('error')}}
                      </div>
                      @endif

                      @if (Session::has('notice'))
                      <div class="session-flash alert-info">
                      {{Session::get('notice')}}
                      </div>
                      @endif
                    @yield("content")   
                </div>
            </div>
        </div>
    </main>


<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

  <!--   <script src="{{ asset('js/material-design/material.min.js') }}"></script>
  <script src="{{ asset('js/material-design/ripples.min.js') }}"></script> -->
<script>
  $(document).ready(function(){
    var date_input=$('input[name="date_birth"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy/mm/dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>
</body>
</html>