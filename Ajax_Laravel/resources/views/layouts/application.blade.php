<!DOCTYPE html>
<html lang="en">
<head>
  <title>Articles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}"/>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}">
    {{-- <link rel="stylesheet" href="https://raw.githubusercontent.com/fronteed/icheck/1.x/skins/square/yellow.css"> --}}

    <!-- toastr notifications -->
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <!--  <link rel="stylesheet" href="{{ asset('css/material-design/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-design/ripples.min.css') }}"> -->
    

    <style>
        .panel-heading {
            padding: 0;
        }
        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .panel-heading li {
            float: left;
            border-right:1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }
        .panel-heading li:last-child:hover {
            background-color: #ccc;
        }
        .panel-heading li:last-child {
            border-right: none;
        }
        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
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
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <!--  <script src="{{ asset('js/material-design/material.min.js') }}"></script>
  <script src="{{ asset('js/material-design/ripples.min.js') }}"></script> -->
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>
    <script type="text/javascript">
      //add
      $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {

            // var _token = $("input[name='_token']").val();

            // var user_add = $("input[name='user_add']").val();

            // var content_add = $("input[name='content_add']").val();

            $.ajax({
                type: 'POST',
                url: '{{ URL::route('comments.store') }}',
                data: {
                    '_token': $('#_token').val(),
                    'article_id': $('#id_add').val(),
                    'user': $('#user_add').val(),
                    'content': $('#content_add').val()
                },
                success: function(data) {
                    $('.errorUser').addClass('hidden');
                    $('.errorContent').addClass('hidden');
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                        if (data.errors.user) {
                            $('.errorUser').removeClass('hidden');
                            $('.errorUser').text(data.errors.user);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully added Comment!', 'Success Alert', {timeOut: 5000});
                        $('#postTable').prepend("<tr class='item" + data.id + "'><td>" + data.user + "</br>" + data.comment + "</td><button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-user='" + data.user + "' data-content='" + data.comment + "'><span class='glyphicon glyphicon-trash'></span> Delete</button><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.user + "' data-content='" + data.comment + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button></td></tr>");                        
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
            });
        });
        // Delete Comment Ajax
         $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#title_delete').val($(this).data('content'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: '/comments/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Comment!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });

        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#title_show').val($(this).data('user'));
            $('#content_show').val($(this).data('comment'));
            $('#showModal').modal('show');
        });
    </script>
</body>
</html>