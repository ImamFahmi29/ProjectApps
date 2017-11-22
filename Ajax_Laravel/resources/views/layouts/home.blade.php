<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta httpequiv="XUACompatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-
scale=1">

<title>Laravel</title>
<link type="text/css" href="/css/bootstrap.css" rel="stylesheet" />
<link type="text/css" href="/assets/css/style.css" rel="stylesheet" />
</head>
@extends('layouts.application')
<body style="padding-top:60px;">
<div id="carousel-example-generic" class="carousel slide container" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="/assets/img/taman-vanda.jpg" alt="Taman Vanda Bandung">
        <div class="carousel-caption">
           
        </div>
    </div>
    <div class="item">
        <img src="/assets/img/taman_musik.jpg" alt="Taman Musik Bandung">
        <div class="carousel-caption">
           
        </div>
    </div>
     <div class="item">
        <img src="/assets/img/taman_lansia.jpg" alt="Taman Lansia Bandung">
        <div class="carousel-caption">
          
        </div>
    </div>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
<!--bagian navigation-->
@include('shared.head_nav')
<!-- Bagian Content -->
<div class="container clearfix">
<div class="row row-offcanvas row-offcanvas-left ">
<!--Bagian Kiri-->
@include("shared.left_nav")
<!--Bagian Kanan-->

<div id="main-content" class="col-xs-12 col-sm-9 main pull-right">

<div class="panel-body">
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

</div>
</div>
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>